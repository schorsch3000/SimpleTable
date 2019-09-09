<?php


namespace SimpleTable;


/**
 * Class KeyValueTable
 * @package SimpleTable
 */
class KeyValueTable
{
    /** @var Table */
    protected $table;

    /**
     * KeyValueTable constructor.
     */
    public function __construct()
    {
        $this->table = New Table();
        $this->table->setColPadding(0, Table::PAD_LEFT);
        $this->table->setColPadding(1, Table::PAD_RIGHT);
    }


    /**
     * @param callable $undecorator
     */
    public function setUnDecorator(callable $unDecorator)
    {
        $this->table->setUnDecorator($unDecorator);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string $keySufix
     */
    public function addRow(string $key = '', string $value = '', string $keySufix = ':')
    {
        $row = $this->table->getEmptyRow();
        if(!strlen($key.$value)){
            $this->table->addRow($row);
            return;
        }

        $keyCell = $row->getEmptyCell(0);
        $keyCell->setValue($key . $keySufix);
        $row->addCell($keyCell);

        $valueCell = $row->getEmptyCell(1);
        $valueCell->setValue($value);
        $row->addCell($valueCell);
        $this->table->addRow($row);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->table;
    }

    public function clear(){
        $this->table->clear();
    }


}