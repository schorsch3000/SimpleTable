<?php


namespace SimpleTable\UnDecorator;


class SymfonyConsole
{
    public function __invoke($textToUnDecorate)
    {
        return strip_tags($textToUnDecorate);
    }


}