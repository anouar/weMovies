<?php

namespace App\Application\Handler\Video;

trait FilterVideoTrait
{
    public function filter(array $movies, int $genre): array
    {
        return $movies;
    }
}
