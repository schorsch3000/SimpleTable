<?php

namespace SimpleTable;

/**
 * Class Row
 * @package SimpleTable
 */
class Row
{
    /** @var int */
    protected $defaultPadding = Table::PAD_LEFT;
    /** @var int[] */
    protected $colPadding = [];
    /** @var callable|null */
    protected $unDecorator = null;
    /** @var  Cell[] */
    protected $cells = [];
    /** @var int[] */
    protected $colSize = [];

    /**
     * @param int $defaultPadding
     */
    public function setDefaultPadding(int $defaultPadding): void
    {
        $this->defaultPadding = $defaultPadding;
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
     * @param callable|null $unDecorator
     */
    public function setUnDecorator(?callable $unDecorator): void
    {
        $this->unDecorator = $unDecorator;
    }

    /**
     * @return string
     */
    public function __toString()
    {

        $ret = [];
        foreach ($this->cells as $cellNum => $cell) {
            $ret[] = str_pad($cell, $this->colSize[$cellNum], ' ', $cell->getPadding());
        }
        return implode(" ", $ret);
    }

    /**
     * @param Cell|string $cell
     */
    public function addCell($cell)
    {

        if (!is_object($cell) || get_class($cell) !== "SimpleTable\\Cell") {
            $value = (string)$cell;
            $cell = $this->getEmptyCell();
            $cell->setValue($value);
        }
        $this->cells[] = $cell;
    }

    /**
     * @param bool|int $col
     * @return Cell
     */
    public function getEmptyCell($col = false)
    {
        $cell = new Cell();
        $cell->setUnDecorator($this->unDecorator);
        if (false === $col) {
            $cell->setPadding($this->defaultPadding);
        } else {
            $cell->setPadding(isset($this->colPadding[$col]) ? $this->colPadding[$col] : $this->defaultPadding);
        }
        return $cell;
    }

    /**
     * @param int[] $colSize
     */
    public function setColSize(array $colSize)
    {
        $this->colSize = $colSize;
    }

    /**
     * @return int[]
     */
    public function getColSize()
    {
        $colSize = [];
        foreach ($this->cells as $cellNum => $cell) {
            $colSize[$cellNum] = $cell->getSize();
        }
        return $colSize;
    }

}