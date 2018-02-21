<?php

namespace Numerals;

/**
* RomanNumerals defines an interface for converting both integers to roman numerals, and roman numerals to integers
*/
interface RomanNumerals
{
    /**
     * @param int $input value to be converted
     * @return string $res the roman numeral equivalent of the integer
     */
    public function generate(int $input);

    /**
     * @param string $input a roman numeral as a string
     * @return int $res the numerical equivalent of the string
     */
    public function parse(string $input);
}
