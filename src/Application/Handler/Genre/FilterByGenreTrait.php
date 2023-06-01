<?php

namespace App\Application\Handler\Genre;

trait FilterByGenreTrait
{
    public function filter(array $genres): array
    {
        $ListGenres = [];
        foreach ($genres['genres'] as $genre) {
            $ListGenres [] = [
                $genre['name'] => $genre['id']
            ];
        }
        return $ListGenres;
    }
}
