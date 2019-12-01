<?php

declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class MoneyFormatterTestCase extends TestCase
{

    /**
     * @dataProvider eurProvider
     */
    public function testEurFormatting($formatterOutput, $eurOutput)
    {
        $numFormMock = $this->createMock(\Main\NumberFormatter::class);

        $numFormMock->method('format')->willReturn($formatterOutput);

        $moneyFormatter = new \Main\MoneyFormatter($numFormMock);

        $this->assertEquals( $eurOutput, $moneyFormatter->formatEur(1234));// initial input doesn't matter
    }

    public function eurProvider()
    {
        return [
            ['1M', '1M €'],
            ['2.84M', '2.84M €'],
            ['535K', '535K €'],
            ['27 534', '27 534 €'],
        ];
    }

    /**
     * @dataProvider usdProvider
     */
    public function testUsdFormatting($formatterOutput, $usdOutput)
    {
        $numFormMock = $this->createMock(\Main\NumberFormatter::class);

        $numFormMock->method('format')->willReturn($formatterOutput);

        $moneyFormatter = new \Main\MoneyFormatter($numFormMock);

        $this->assertEquals( $usdOutput, $moneyFormatter->formatUsd(1234));// initial input doesn't matter
    }

    public function usdProvider()
    {
        return [
            ['1M', '$1M'],
            ['2.84M', '$2.84M'],
            ['535K', '$535K'],
            ['27 534', '$27 534'],
        ];
    }
}