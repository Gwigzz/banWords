<?php

namespace App\Grd\BanWords;

use App\Grd\BanWords\BadWords;

/**
 * Ban Bad Words
 * 
 * Information : The problem to the class is this. If you have the same bad words, the next bad word is not banned
 * 
 * @author Guillaume Rigourd <guillaumergd@hotmail.com>
 */
class BanWords extends BadWords
{
    /**
     * Bad word replaced by it
     */
    private const REPLACE = '***';

    /**
     * Words require control
     * 
     * @return string
     */
    private string $characters;

    /**
     * Signal bad words
     * 
     * By default is false
     */
    private bool $signal = false;

    /**
     * Filter words
     */
    private string $filter;

    public function __construct(string $characters)
    {
        $this->setCharacters($characters);
    }

    /**
     * Check if the characters content bad words
     * 
     * Information : This function is called first
     *
     * @param string $string
     * 
     */
    public function check()
    {
        // converted each word of string in array
        $explode = explode(' ', strtolower($this->getCharacters()));

        // count total bad words
        for ($i = 0; $i < $this->countArrayBadWords(); $i++) {
            // count string
            for ($j = 0; $j < count($explode); $j++) {

                // check if string contains bad word
                if ($this->list()[$i] == $explode[$j]) {
                    // replace bad word
                    $explode[$j] = self::REPLACE;

                    // bad word(s) spotted 
                    $this->setSignal(true);
                    break;
                }
            }
        }

        // converted to string
        $implode = implode(' ', $explode);

        // set signal
        $this->setFilter(ucfirst($implode));

        return $this;
    }

    /**
     * Get the characters passed in filter
     *
     * @return string
     */
    public function getFilter(): string
    {
        if (isset($this->filter)) {
            return $this->filter;
        }
        throw new \ErrorException("Require call to 'check' method before get filter");
    }

    /**
     * Is automatique set with the check method
     *
     * @param string $filter
     */
    private function setFilter(string $filter): self
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * Get bad words by true or false response
     * 
     * False by default
     * 
     * @return boolean
     */
    public function getSignal(): bool
    {
        return $this->signal;
    }
    private function setSignal(bool $signal)
    {
        $this->signal = $signal;
        return $this;
    }

    /**
     * Get the default characters
     *
     * @return string
     */
    public function getCharacters(): string
    {
        return $this->characters;
    }

    private function setCharacters($characters): self
    {
        $this->characters = $characters;
        return $this;
    }

    /**
     * Count total of bad words register from Class 'BadWords.php'
     *
     * @return integer
     */
    private function countArrayBadWords(): int
    {
        return count($this->list());
    }

    /**
     * Filter bad words (DEPRECATED)
     *
     * @param string $string
     * @return string|null
     * 
     * @deprecated Filter V1 is deprecated cause not accessor for Signal. Do not use it with this Class
     */
    public function filterV1(string $string): ?string
    {
        // converted each word of string in array
        $explode = explode(' ', strtolower($string));

        // count total bad words
        for ($i = 0; $i < $this->countArrayBadWords(); $i++) {

            // count string
            for ($j = 0; $j < count($explode); $j++) {

                // check if string contains bad word
                if ($this->list()[$i] == $explode[$j]) {
                    // replace bad word
                    $explode[$j] = self::REPLACE;
                    break;
                }
            }
        }

        // converted to string
        $implode = implode(' ', $explode);
        return ucfirst($implode);
    }
}
