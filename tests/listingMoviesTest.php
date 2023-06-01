<?php

namespace App\Tests;
use App\Application\Handler\Movie\ListingMovieHandle;
use App\Domain\Movie;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class listingMoviesTest extends WebTestCase
{
    protected static $baseUri = 'https://api.themoviedb.org/3/';

    public function testListingMovies(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $client = $container->get(ListingMovieHandle::class);
        $movies = $client->handle();
        self::assertSame(20, count($movies));
        //test for movie 603692 (popular movies)
        $movie = new Movie();
        $movie->setTitle('John Wick : Chapitre 4');
        $movie->setId(603692);
        $movie->setOriginalLanguage("en");
        if($movies[0]['id'] == $movie->getId()) {
            self::assertSame($movies[0]['id'], $movie->getId());
            self::assertSame($movies[0]['title'], $movie->getTitle());
            self::assertSame($movies[0]['original_language'], $movie->getOriginalLanguage());
        }
    }
}