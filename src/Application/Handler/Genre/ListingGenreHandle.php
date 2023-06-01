<?php

namespace App\Application\Handler\Genre;

use App\Application\Handler\Movie\Exception;
use App\Infrastructure\AbstractApi;
use App\Infrastructure\Service\AbstractClientApiInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class ListingGenreHandle
{
    use FilterByGenreTrait;
    final public const URI_GENRES_MOVIES_LIST =  "/genre/movie/list";

    public function __construct(private readonly AbstractClientApiInterface $abstractClientApi, private readonly ContainerBagInterface $containerBag)
    {
    }

    public function handle(): array
    {
        $genres = $this->abstractClientApi->getResponseData($this->containerBag->get('api.version') . self::URI_GENRES_MOVIES_LIST);
        return $this->filter($genres);
    }
}
