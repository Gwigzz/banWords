<?php

namespace App\Grd\BanWords;

/**
 * @author Guillaume Rigourd <grd@email.fr>
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
