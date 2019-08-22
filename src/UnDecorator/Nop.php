<?php


namespace SimpleTable\UnDecorator;


class Nop
{
    public function __invoke($textToUnDecorate)
    {
        return $textToUnDecorate;
    }


}