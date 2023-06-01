<?php

namespace App\Application\Handler\Rating;

use App\Application\Handler\Video\FilterVideoTrait;
use App\Infrastructure\Service\AbstractClientApiInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class RatingMovieHandler
{
    use FilterVideoTrait;
    final public const URI_RATING_MOVIE = "/movie/%s/rating";
    public function __construct(private readonly AbstractClientApiInterface $abstractClientApi, private readonly ContainerBagInterface $containerBag)
    {
    }

    public function handle(int $movie_id): array
    {
        $video = [];
        if($movie_id !== 0) {
            $video = $this->abstractClientApi->postData($this->containerBag->get('api.version') . sprintf(self::URI_RATING_MOVIE, $movie_id), ['RAW_BODY' => '']);
        }
        return $video;
    }
}
