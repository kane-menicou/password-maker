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
}
