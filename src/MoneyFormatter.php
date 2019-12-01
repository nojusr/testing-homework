<?php

declare(strict_types = 1);

namespace Main;

require __DIR__ . '/../vendor/autoload.php';

class MoneyFormatter
{

    private $formatter;

    public function __construct(NumberFormatter $formatter) {
        $this->formatter = $formatter;
    }


    public function formatEur(float $input): string
    {
        $formattedNum = $this->formatter->format($input);
        return $formattedNum." €";
    }

    public function formatUsd(float $input): string
    {
        $formattedNum = $this->formatter->format($input);
        return "$".$formattedNum;
    }
}