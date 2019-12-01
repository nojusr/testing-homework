<?php

declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class NumberFormatterTestCase extends TestCase
{

    /**
     * @dataProvider provider
     */
    public function testFormatting(float $input, string $testOutput)
    {
        $formatter = new \Main\NumberFormatter();
        $this->assertEquals( $testOutput, $formatter->format($input));
    }

    public function provider()
    {
        return [
            [999500, '1M'],
            [2835779, '2.84M'],
            [535216, '535K'],
            [99950, '100K'],
            [27533.78, '27 534'],
            [999.99, '999.99'],
            [999.9999, '1 000'],
            [533.1, '533.10'],
            [12.00, '12'],
            [66.6666, '66.67'],
            [-999500, '-1M'],
            [-2835779, '-2.84M'],
            [-535216, '-535K'],
            [-99950, '-100K'],
            [-27533.78, '-27 534'],
            [-533.1, '-533.10'],
            [-12.00, '-12'],
            [-66.6666, '-66.67'],
            [-123654.89, '-124K']
        ];
    }


}