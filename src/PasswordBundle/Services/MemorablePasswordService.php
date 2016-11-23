<?php

namespace PasswordBundle\Services;


class MemorablePasswordService
{
    /**
     * @param int $length
     * @param bool $allowLetters
     * @param bool $allowNumbers
     * @param bool $allowSymbols
     * @param bool $allowUpperCase
     *
     * @return int|mixed|string
     */

    public function passwordMaker(
        $length = 7, $allowNumbers = true, $allowSymbols = true
    )
    {
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $symbols = ['{', '}', '(', ')', '[', "]", '#', ':', ';', '^', ',', '.', '?', '!', '|', '&', '_', '`','~', '@',
            '$', '%', '/', '\\', '=', '+', '*', '-','"', "'"
        ];
        $constants =[ 'b','b', 'c','c','c', 'd','d','d','d','d', 'f','f','f', 'g','g','g', 'h','h','h','h','h','h', 'j',
            'k', 'l', 'l','l','l','l', 'm','m','m', 'n','n','n','n','n','n', 'p', 'p', 'q', 'r','r','r','r','r', 's',
            's','s','s','s','s','s', 't','t','t','t','t','t','t','t','t', 'v', 'w','w','w', 'x', 'y', 'y' ,'z'
        ];
        $vowels = ['a','a','a','a','a','a','a','a', 'e','e','e','e','e','e','e','e','e','e','e','e', 'i','i','i','i',
            'i','i', 'o','o','o','o','o','o','o','o', 'u','u','u'];

        $password = [];
        $notVowelNumber = 0;
        $passwordLength = 0;

        while ($length > $passwordLength) {
            $index = rand(1, 5);
            if ($index === 1 || $notVowelNumber - 1 === $length) {
                array_push($password, $vowels[rand(0, 36)]);
                $passwordLength += 1;
            }elseif ($allowNumbers === true && $index === 2) {
                array_push($password, $numbers[rand(0,9)]);
                $passwordLength += 1;
                $notVowelNumber += 1;
            } elseif ($index === 3) {
                array_push($password, $symbols[rand(0,27)]);
                $passwordLength += 1;
                $notVowelNumber += 1;
            } else {
                $letter = $constants[rand(0, 69)];
                array_push($password, $letter);
                $passwordLength += 1;
                $notVowelNumber += 1;
            }
            if ($password[$passwordLength -1] === 'q' && $length > $passwordLength){
                array_push($password, 'u');
                $passwordLength += 1;
            }
            }
            if ($length === $passwordLength) {
                if (
                    $password[$length - 1] === 'i' ||
                    $password[$length - 1] === 'u' ||
                    $password[$length - 1] === 'v' ||
                    $password[$length - 1] === 'j' ||
                    $password[$length - 1] === 'q' ||
                    $password[$length - 1] === 'v' ||
                    $password[$length - 1] === 'u'
                ) {
                    $passwordLength = 0;
                    $password = [];
                }
            }
        return implode('', $password);
    }
}