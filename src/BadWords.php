<?php

namespace App\Grd\BanWords;

/**
 * @author Guillaume Rigourd <guillaumergd@hotmail.com>
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
        return [
            'bad',
            'noob',
            'fuk',
            '...'
        ];
    }
}
