<?php

namespace kunalp;


class LuhnValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function providerValidate()
    {
        return [
            ["79927398713", TRUE],
            ["079927398713", TRUE],
            ["7992 739 8713", TRUE],
            [" 7 9 9 2 7 3 9 8 7 1 3 ", TRUE],

            ["79927398710", FALSE],
            ["79927398711", FALSE],
            ["79927398712", FALSE],
            ["79927398714", FALSE],
            ["79927398715", FALSE],
            ["79927398716", FALSE],
            ["79927398717", FALSE],
            ["79927398718", FALSE],
            ["79927398719", FALSE],
            ["foo", FALSE],
            ["79927398713foo", FALSE],
            ["0", FALSE],
            ["", FALSE]
        ];
    }

    /**
     * @dataProvider providerValidate
     */
    public function testValidNumbers($number, $expected)
    {
        $validator = new LuhnValidator();

        $result = $validator->validate($number);

        $this->assertSame($expected, $result);
    }
}
