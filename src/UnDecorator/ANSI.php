<?php


namespace SimpleTable\UnDecorator;


class ANSI
{
    public function __invoke($textToUnDecorate)
    {
        return preg_replace('#\\x1b[[][^A-Za-z]*[A-Za-z]#', '', $textToUnDecorate);
    }


}