<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MovieControllerTest extends WebTestCase
{
    public function testHomePage()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('a.navbar-brand', 'A propos de We Movies');
    }

    public function testAutocomplete()
    {
        $client = static::createClient();
        $client->request('GET', '/movies/autocomplete');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertResponseIsSuccessful();
    }


    public function testListingMovies()
    {
        $client = static::createClient();
        $client->request('GET', '/movies/listing');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        $this->assertResponseIsSuccessful();
    }
}