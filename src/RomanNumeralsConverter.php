<?php

namespace Numerals;

/**
* RomanNumeralsConverter is a simple class for converting
* both integers to roman numerals, and roman numerals to integers
*
* @author   David Boyle <dave@daveboyle.co.uk>
* @version  $Revision: 1.0 $
* @access   public
*/
class RomanNumeralsConverter implements RomanNumerals
{
    /** @var Conversions */
    protected $conversions = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    /**
     * @param int $input value to be converted
     * @return string $res the roman numeral equivalent of the integer
     */
    public function generate(int $input)
    {
        $this->validateNumericalInput($input);

        $res = '';

        foreach ($this->conversions as $key => $val) {
            while ($input >= $key) {
                $res .= $val;
                $input -= $key;
            }
        }

        return $res;
    }

    /**
     * @param string $input a roman numeral as a string
     * @return int $res the numerical equivalent of the string
     */
    public function parse(string $input)
    {
        $this->validateRomanNumeral($input);

        $res = 0;

        foreach (array_flip($this->conversions) as $key => $val) {
            while (strpos($input, $key) === 0) {
                $res += $val;
                $input = substr($input, strlen($key));
            }
        }
        
        return $res;
    }

    /**
     * @param int $input to validate
     * @throws Exception if the argument is not in the allowed range
     */
    protected function validateNumericalInput(int $input)
    {
        if ($input <= 0 || $input > 3999) {
            throw new \Exception('Invalid input - out of range');
        }
    }

    /**
     * @param string $input a roman numeral as a string
     * @throws Exception if the input is not a valid roman numeral
     */
    protected function validateRomanNumeral(string $input)
    {
        if (!preg_match('/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $input)) {
            throw new \Exception('Invalid input - not a valid roman numeral');
        }
    }
}
