<?php

namespace App\Tests;

use App\Application\Handler\Video\VideoMovieHandler;
use App\Domain\Video;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VideoMoviesTest extends WebTestCase
{
    protected static $baseUri = 'https://api.themoviedb.org/3/';

    public function testVideoMovies(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $client = $container->get(VideoMovieHandler::class);

        $videos = $client->handle(603692);


        //test for movie 603692 (popular movies)
        $video = new Video();
        $video->setName('Special Feature - Rina’s Range');
        $video->setId("642231e623be4600febeb864");
        $video->setType("Featurette");

            self::assertSame($videos['results'][0]['name'], $video->getName());
            self::assertSame($videos['results'][0]['type'], $video->getType());
            self::assertSame($videos['results'][0]['id'], $video->getId());
    }
}