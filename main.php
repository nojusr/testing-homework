<?php

require __DIR__ . '/vendor/autoload.php';

$moneyForm = new Main\MoneyFormatter(new Main\NumberFormatter());

$output = $moneyForm ->formatEur(2835779);
echo $output."\n";
$output = $moneyForm->formatUsd(2835779);
echo $output."\n";
