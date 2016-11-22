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
        $length = 4, $allowLetters = true, $allowNumbers = true, $allowSymbols = true, $allowUpperCase = true
    )
    {
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $symbols = ['{', '}', '(', ')', '[', "]", '#', ':', ';', '^', ',', '.', '?', '!', '|', '&', '_', '`','~', '@',
            '$', '%', '/', '\\', '=', '+', '*', '-','"', "''"
        ];
        $constants =[ 'b','b', 'c','c','c', 'd','d','d','d','d', 'f','f','f', 'g','g','g', 'h','h','h','h','h','h', 'j',
            'k', 'l', 'l','l','l','l', 'm','m','m', 'n','n','n','n','n','n', 'p', 'p', 'q', 'r','r','r','r','r', 's',
            's','s','s','s','s','s', 't','t','t','t','t','t','t','t','t', 'v', 'w','w','w', 'x', 'y', 'y' ,'z'
        ];
        $vowels = ['a','a','a','a','a','a','a','a', 'e','e','e','e','e','e','e','e','e','e','e','e', 'i','i','i','i',
            'i','i', 'o','o','o','o','o','o','o','o', 'u','u','u'];

        $word = [];
        $constantNumber = 0;
        $passwordLength = 0;

        while ($length > $passwordLength) {
            if ($allowLetters === true) {
                $index = rand(1, 4);
                if ($index === 1 || $constantNumber - 1 === $length) {
                    array_push($word, $vowels[rand(0, 36)]);
                    $passwordLength += 1;
                } else {
                    $letter = $constants[rand(0, 69)];
                    array_push($word, $letter);
                    $passwordLength += 1;
                    $constantNumber += 1;
                }
                if ($word[$passwordLength -1] === 'q' && $length > $passwordLength){
                    array_push($word, 'u');
                    $passwordLength += 1;
            }
            }
            if ($length === $passwordLength) {
                if (
                    $word[$length - 1] === 'i' ||
                    $word[$length - 1] === 'u' ||
                    $word[$length - 1] === 'v' ||
                    $word[$length - 1] === 'j' ||
                    $word[$length - 1] === 'q' ||
                    $word[$length - 1] === 'v' ||
                    $word[$length - 1] === 'u'
                ) {
                    $passwordLength = 0;
                    $word = [];
                }
            }
        }
        return implode('', $word);
    }
}