<?php

namespace SimpleTable;

use SimpleTable\UnDecorator\Nop;

class Table
{
    public const PAD_LEFT = STR_PAD_LEFT;
    public const PAD_RIGHT = STR_PAD_RIGHT;
    public const PAD_BOTH = STR_PAD_BOTH;
    /** @var int */
    protected $defaultPadding = Table::PAD_RIGHT;
    /** @var int[] */
    protected $colPadding = [];
    /** @var callable|null */
    protected $unDecorator = null;
    /** @var Row[] */
    protected $rows = [];

    /**
     * Table constructor.
     */
    public function __construct()
    {
        $this->unDecorator=new Nop();
    }


    /**
     * @param int $padding
     */
    public function setDefaultPadding(int $padding)
    {
        $this->defaultPadding = $padding;
    }

    /**
     * @param callable $unDecorator
     */
    public function setUnDecorator(?callable $unDecorator): void
    {
        $this->unDecorator = $unDecorator;
    }

    /**
     * @param Row $row
     */
    public function addRow(Row $row)
    {
        $this->rows[] = $row;
    }

    /**
     * @return Row
     */
    public function getEmptyRow()
    {
        $row = new Row();
        foreach ($this->colPadding as $col => $padding) {
            $row->setColPadding($col, $padding);
        }
        $row->setDefaultPadding($this->defaultPadding);
        $row->setUnDecorator($this->unDecorator);
        return $row;
    }

    /**
     * @param int $col
     * @param int $colPadding
     */
    public function setColPadding(int $col, int $colPadding): void
    {
        $this->colPadding[$col] = $colPadding;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $colSize=[];
        foreach($this->rows as $row){
            foreach($row->getColSize() as $colNum => $length){
                if(!isset($colSize[$colNum])){
                    $colSize[$colNum]=0;
                }
                $colSize[$colNum]=max($colSize[$colNum],$length);
            }
        }
        $ret=[];
        foreach($this->rows as $row){
            $row->setColSize($colSize);
            $ret[]=$row;
        }
        return implode("\n",$ret);

    }
    public function clear(){
        $this->rows=[];
        $this->colPadding=[];
    }

}