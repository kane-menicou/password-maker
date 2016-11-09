<?php

namespace PasswordBundle\Entity;

class Password
{
    /**
     * @var integer
     */
    protected $length;

    /**
     * @var array
     */
    protected $characters;

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
     * @return array
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * @param array $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

}
