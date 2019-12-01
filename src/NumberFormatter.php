<?php

declare(strict_types = 1);

namespace Main;

class NumberFormatter
{
    public function format(float $input): string
    {
        if (999500 <= abs($input)) {
            $input /= 1000000;
            $input = round($input, 2);
            return $input.'M';
        }

        if (99950 <= abs($input) && abs($input) < 999500) {
            $input /= 1000;
            $input = round($input, 0);
            return $input.'K';
        }

        if (1000 <= abs($input) && abs($input) < 99950) {
            $input = round($input, 0);
            $input = number_format($input, 0, "", " ");
            return $input;
        }

        if (0 <= abs($input) && abs($input) < 1000) {
            if (floor($input) == $input) {
                $input = round($input, 0);
            } else {
                $input = round($input, 2);
                if ($input == 1000) {
                    $input = number_format($input, 0, "", " ");
                } else {
                    $input = number_format($input, 2, ".", "");
                }
            }
            return (string)$input;
        }
    }
}