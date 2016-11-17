<?php

namespace PasswordBundle\Entity;

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
     * @var bool
     */
    protected $symbols;

    /**
     * @var bool
     */
    protected $upperCase;

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

    /**
     * @return boolean
     */
    public function isSymbols()
    {
        return $this->symbols;
    }

    /**
     * @param boolean $symbols
     */
    public function setSymbols($symbols)
    {
        $this->symbols = $symbols;
    }

    /**
     * @return boolean
     */
    public function isUpperCase()
    {
        return $this->upperCase;
    }

    /**
     * @param boolean $upperCase
     */
    public function setUpperCase($upperCase)
    {
        $this->upperCase = $upperCase;
    }
}
