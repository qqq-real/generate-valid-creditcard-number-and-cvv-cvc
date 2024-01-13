<?php 

class ccheckApi
{
    /**
     * Generate a valid credit card number using a given prefix.
     *
     * @param string $prefix The prefix of the credit card number.
     * @return string The generated credit card number.
     */
    public function generateCreditCardNumber($prefix) {
        $number = $prefix;
        $length = ((int)strlen($number));
        // Generate additional digits to make total length 15 (prefix + remaining digits)
        for ($i = $length; $i < 15; $i++) {
            $number .= mt_rand(0, 9);
        }
        // Add Luhn check digit and append it to the prefix
        $number .= $this->calculateLuhnCheckDigit($number);
        return $number;
    }

    /**
     * Calculate the Luhn check digit for a given number.
     *
     * @param string $number The number to calculate the Luhn check digit for.
     * @return int The calculated Luhn check digit.
     */
    private function calculateLuhnCheckDigit($number) {
        $sum = 0;
        $even = true;
        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $digit = intval($number[$i]);
            if ($even) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
            $even = !$even;
        }
        return ($sum * 9) % 10;
    }

    /**
     * Generate a random CVV number between 001 and 999 without repeating the result.
     *
     * @return string The generated CVV number.
     */
    public function generateCVV() {
        // Generate an array of all possible numbers between 001 and 999
        $numbers = range(1, 999);
        $numbers = array_map(function($number) {
            return str_pad($number, 3, '0', STR_PAD_LEFT);
        }, $numbers);

        // Shuffle the array to randomize the order
        shuffle($numbers);

        // Get the first number from the shuffled array and remove it from the array
        $randomNumber = array_shift($numbers);

        return $randomNumber;
    }

}