<?php

if (!function_exists('number_to_words')) {
    function number_to_words($number)
    {
        $words = [
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'forty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
        ];

        if ($number < 0) {
            return 'minus ' . number_to_words(abs($number));
        }

        $string = '';

        // Converting Crore
        if ($number >= 10000000) {
            $string .= number_to_words(floor($number / 10000000)) . ' crore ';
            $number %= 10000000;
        }

        // Converting Lakh
        if ($number >= 100000) {
            $string .= number_to_words(floor($number / 100000)) . ' lakh ';
            $number %= 100000;
        }

        // Converting Thousand
        if ($number >= 1000) {
            $string .= number_to_words(floor($number / 1000)) . ' thousand ';
            $number %= 1000;
        }

        // Converting Hundred
        if ($number >= 100) {
            $string .= number_to_words(floor($number / 100)) . ' hundred ';
            $number %= 100;
        }

        // Converting Tens and Units
        if ($number > 0) {
            if ($number < 20) {
                $string .= $words[$number];
            } else {
                $string .= $words[10 * floor($number / 10)];
                $unit = $number % 10;
                if ($unit > 0) {
                    $string .= '-' . $words[$unit];
                }
            }
        }

        return $string;
    }
}
