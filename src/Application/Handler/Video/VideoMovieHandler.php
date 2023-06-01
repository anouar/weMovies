<?php

namespace App\Application\Handler\Video;

use App\Infrastructure\Service\AbstractClientApiInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class VideoMovieHandler
{
    use FilterVideoTrait;
    final public const URI_VIDEO_MOVIE = "/movie/%s/videos";
    public function __construct(private readonly AbstractClientApiInterface $abstractClientApi, private readonly ContainerBagInterface $containerBag)
    {
    }

    public function handle(int $movie_id): array
    {
        $video = [];
        if($movie_id !== 0) {
            $video = $this->abstractClientApi->getResponseData($this->containerBag->get('api.version') . sprintf(self::URI_VIDEO_MOVIE, $movie_id));
        }
        return $video;
    }
}
