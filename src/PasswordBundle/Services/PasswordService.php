<?php

namespace PasswordBundle\Services;


class PasswordService
{
    /**
     * @var string $password
     */
    private $password;

    /**
     * @param int $length
     * @param bool $allowLetters
     * @param bool $allowNumbers
     *
     * @param bool $allowSymbols
     * @param bool $allowUpperCase
     * @return string
     * @internal param array $allowedChars
     */
    public function passwordMaker(
        $length = 10, $allowLetters = true, $allowNumbers = true, $allowSymbols = true, $allowUpperCase = true
    )
    {
        $allowedChars = [];
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $letters =[ 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'p', 'q', 'r',
            's', 't', 'u', 'v', 'w', 'x', 'y' ,'z'
        ];
        $symbols = ['{', '}', '(', ')', '[', "]", '#', ':', ';', '^', ',', '.', '?', '!', '|', '&', '_', '`','~', '@',
            '$', '%', '/', '\\', '=', '+', '*', '-','"', "''"
        ];
        $upperCase = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','Q','R','S','T','U', 'V','W','X','Y',
            'Z'
        ];
        $newLineCount = 0;

        if ($allowLetters === true) {
            $allowedChars = array_merge($allowedChars, $letters);
        }
        if ($allowNumbers === true) {
            $allowedChars = array_merge($allowedChars, $numbers);
        }
        if ($allowSymbols === true) {
            $allowedChars = array_merge($allowedChars, $symbols);
        }
        if ($allowUpperCase === true) {
            $allowedChars = array_merge($allowedChars, $upperCase);
        }

        while ($length > 0) {
            $this->password = $this->password . $allowedChars[rand(0, count($allowedChars) - 1)];
            $length -= 1;
            $newLineCount += 1;
            if ($newLineCount === 50){
                $this->password = $this->password."\n";
                $newLineCount = 0;
            }
        }


        return $this->password;
    }
}