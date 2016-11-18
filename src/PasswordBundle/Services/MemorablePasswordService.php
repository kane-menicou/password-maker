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
        $allowedChars = [];
        $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $words =[ 'apple', 'brown', 'cat', 'duff', 'egghead', 'for', 'girl', 'hip', 'internet', 'jumping', 'kicking',
            'lips', 'motherboard', 'never', 'open', 'pee', 'quickly', 'resolve', 'status', 'technology', 'uniforms',
            'vegan', 'what', 'xylophone', 'yoop' ,'zeep'
        ];
        $symbols = ['{', '}', '(', ')', '[', "]", '#', ':', ';', '^', ',', '.', '?', '!', '|', '&', '_', '`','~', '@',
            '$', '%', '/', '\\', '=', '+', '*', '-','"', "''"
        ];
        $upperWords = ['Alphabet','Beet','Control','Drizzle','Exuvium','Fall','Gweduck','Hommock','Injured','Jumpoff',
            'Knobbly','Lunch','Money','Nymphal','Offence','Quippus','Reequip','Sitting','Toenail','Uniform', 'Vowels',
            'Wavy','Xylophone','Yakkity', 'Zulue'
        ];
        $constants =[ 'b', 'c', 'd',  'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n',  'p', 'p', 'q', 'r', 's', 't', 'v', 'w',
            'x', 'y' ,'z'
        ];
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $word = [];
        $constantNumber = 0;
        $passwordLength = 0;

        while ($length > $passwordLength) {
            $index = rand(1,4);
            if ($index === 1 || $constantNumber -1 === $length){
                array_push($word, $vowels[rand(0,4)]);
                $passwordLength += 1;
            }else{
                $letter = $constants[rand(0,20)];
                if ($letter === 'q' && $passwordLength + 1 !== $length ){
                    array_push($word, $letter, 'u');
                }elseif ($letter !== 'q'){
                    array_push($word, $letter);
                }
                $constantNumber += 1;
                $passwordLength += 1;
            }
        }

        return implode('', $word);
    }
}