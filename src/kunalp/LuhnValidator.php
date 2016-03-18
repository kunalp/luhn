<?php
namespace kunalp;


class LuhnValidator
{

    /**
     * A valid number should only contain numerical digits.
     *
     */
    const VALID_NUMBER_REGEX = '/[\d]{2,}/';


    /**
     * Validate a number using the Luhn algorithm.
     *
     * The validator will ignore whitespace, but any other non-numeric characters will
     * be considered invalid.
     *
     * @param string $number
     * @return bool
     */
    public function validate($number)
    {
        $number = preg_replace('/\s/', '', $number);

        if (! preg_match(self::VALID_NUMBER_REGEX, $number)) {
            return FALSE;
        }

        return $this->checksum($number) === 0;
    }


    /**
     * Calculate a checksum for a number.
     *
     * @param string $number
     * @return int
     */
    private function checksum($number)
    {
        $digits = str_split(strrev($number));
        $checksum = '';

        foreach ($digits as $i => $d) {
            $checksum .= ($i % 2 === 0) ? $d : $d*2;
        }

        return array_sum(str_split($checksum)) % 10;
    }

}