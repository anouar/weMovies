<?php

namespace App\Application\Handler\Movie;

use App\Infrastructure\AbstractApi;
use App\Infrastructure\Service\AbstractClientApiInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class ListingMovieHandle
{
    use FilterMoviesListingTrait;
    final public const URI_MOVIES_LIST = "/discover/movie";

    public function __construct(private readonly AbstractClientApiInterface $abstractClientApi, private readonly ContainerBagInterface $containerBag)
    {
    }

    public function handle(?string $genres='', ?string $keywords=''): array
    {
        $query = ['sort_by' => "popularity.desc", 'language'=> 'fr-FR', 'with_genres' => $genres, 'with_keywords' => $keywords];
        $movies = $this->abstractClientApi->getResponseData($this->containerBag->get('api.version') . self::URI_MOVIES_LIST, $query);

        if ($movies === []) {
            throw new Exception('Which league matches you want to see?');
        }
        return $movies['results'];
    }
}
