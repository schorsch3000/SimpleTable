<?php

namespace SimpleTable;

/**
 * Class Cell
 * @package SimpleTable
 */
class Cell
{
    /** @var int */
    protected $padding = Table::PAD_LEFT;
    /** @var callable| */
    protected $unDecorator ;

    /** @var string */
    protected $value = '';

    /**
     * @param int $padding
     */
    public function setPadding(int $padding): void
    {
        $this->padding = $padding;
    }

    /**
     * @return int
     */
    public function getPadding(): int
    {
        return $this->padding;
    }


    /**
     * @param callable $unDecorator
     */
    public function setUnDecorator(callable $unDecorator): void
    {
        $this->unDecorator = $unDecorator;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = str_replace(["\n", "\r"], " ", $value);
    }

    /**
     * @return int
     */
    public function getSize(){

        return mb_strlen(($this->unDecorator)($this->value));
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }


}