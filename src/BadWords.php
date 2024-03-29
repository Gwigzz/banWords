<?php

namespace App\Grd\BanWords;

/**
 * @author Guillaume Rigourd <grd@php.net>
 */
abstract class BadWords
{
    /**
     * List of bad words order by ASC
     * 
     * You can add more words
     * 
     * @return array
     */
    protected function list(): array
    {
        // set more bad words
        return [
            'bad',
            'noob',
            'fuk',
            '...'
        ];
    }
}
