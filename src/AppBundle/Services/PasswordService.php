<?php

namespace AppBundle\Services;


class PasswordService
{
    /**
     * @var string $password
     */
    private $password;

    /**
     * @param int $length
     * @param array $allowedChars
     *
     * @return string
     */
    public function passwordMaker($length = 10, $allowedChars = ['A', 'a', 'B', 'b','C', 'c', 'D', 'd', 'E', 'e', 'F',
        'f', 'G', 'g', 'H', 'h', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q',
        'q', 'R', 'r', 'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z','z', 0, 1, 2, 3, 4, 5,
         6, 7, 8, 9
    ])
    {
        while ($length > 0){
            $this->password = $this->password.$allowedChars[rand(0, count($allowedChars) - 1)];
            $length -= 1;
        }
        return $this->password;
    }
}