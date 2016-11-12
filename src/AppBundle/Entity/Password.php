<?php

namespace AppBundle\Entity;

class Password
{
    /**
     * @var integer
     */
    protected $length;

    /**
     * @var bool
     */
    protected $letters;

    /**
     * @var bool
     */
    protected $numbers;

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return boolean
     */
    public function isLetters()
    {
        return $this->letters;
    }

    /**
     * @param boolean $letters
     */
    public function setLetters($letters)
    {
        $this->letters = $letters;
    }

    /**
     * @return boolean
     */
    public function isNumbers()
    {
        return $this->numbers;
    }

    /**
     * @param boolean $numbers
     */
    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;
    }
}
