<?php

require_once("src/RomanNumeralsConverter.php");

use Numerals\RomanNumeralsConverter;

$converter = new RomanNumeralsConverter();

$data = [
    'I' => 1,
    'V' => 5,
    'X' => 10,
    'MM' => 2000,
    'MMXI' => 2011,
    'MCMXC' => 1990,
    'MCMLXXV' => 1975,
    'MMMCMXCIX' => 3999,
];

foreach ($data as $key => $val) {
	echo($converter->generate($val));
	echo(' => ');
	echo($converter->parse($key));
	echo("\n");
}