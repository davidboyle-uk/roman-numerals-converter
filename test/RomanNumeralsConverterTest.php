<?php

namespace Numerals\Test;

include(__DIR__ . '/../src/RomanNumerals.php');
include(__DIR__ . '/../src/RomanNumeralsConverter.php');

use PHPUnit\Framework\TestCase;
use Numerals\RomanNumerals;
use Numerals\RomanNumeralsConverter;

class RomanNumeralsConverterTest extends TestCase
{
    /** @var RomanNumeralsConverter */
    private $sut;

    protected function setUp()
    {
        $this->sut = new RomanNumeralsConverter();
    }

    public function testShouldImplementTheAppropriateInterface()
    {
        $this->assertInstanceOf(RomanNumerals::class, $this->sut);
    }

    /**
    * @expectedException \TypeError
    */
    public function testInvalidIntegerInput()
    {
        $input = 'abc';
        $this->sut->generate($input);

    }

    /**
    * @expectedException \Exception
    * @expectedExceptionMessage Invalid input - out of range
    */
    public function testOutOfRangeInput()
    {
        $input = 4000;
        $this->sut->generate($input);
        
    }

    /**
    * @expectedException \Exception
    * @expectedExceptionMessage Invalid input - not a valid roman numeral
    */
    public function testInvalidStringInput()
    {
        $input = 123;
        $this->sut->parse($input);

    }

    /**
    * @expectedException \Exception
    * @expectedExceptionMessage Invalid input - not a valid roman numeral
    */
    public function testInvalidRomanNumeralInput()
    {
        $input = 'ABC';
        $this->sut->parse($input);
        
    }

    public function testExpectedResults()
    {
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
            $this->assertEquals($key, $this->sut->generate($val));
            $this->assertEquals($val, $this->sut->parse($key));
        }
    }

}