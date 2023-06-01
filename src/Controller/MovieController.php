<?php

namespace App\Controller;

use App\Application\Handler\Genre\ListingGenreHandle;
use App\Application\Handler\Movie\LastestBestMovieHandler;
use App\Application\Handler\Movie\ListingMovieHandle;
use App\Application\Handler\Video\VideoMovieHandler;
use App\Infrastructure\Form\GenreType;
use App\Infrastructure\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    public function __construct(
        private readonly ListingMovieHandle $listingMovieHandle,
        private readonly VideoMovieHandler $videoMovieHandler,
        private readonly ListingGenreHandle $listingGenreHandle
    ) {
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $lastestMovie = $movieVideo = $genres = [];
        $lastestMovie = $this->listingMovieHandle->handle();
        if(count($lastestMovie) > 0) {
            $movieVideo = $this->videoMovieHandler->handle($lastestMovie[0]['id']);
        }
        $genres =  $this->listingGenreHandle->handle();
        $form = $this->createForm(GenreType::class, null, ['genres' => $genres]);
        $formSearch = $this->createForm(SearchType::class);
        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'formSearch' => $formSearch->createView(),
            'movieVideo' => $movieVideo['results'][0]
        ]);
    }
    #[Route('/movies/listing', name: 'app_listing_movie')]
    public function listingMovies(Request $request): JsonResponse
    {
        $movies = [];
        if($request->isXmlHttpRequest()) {
            $genres = $request->request->get('with_genres');
            $tags = $request->request->get('with_keywords');
            $movies = $this->listingMovieHandle->handle($genres, $tags);
        }

        return new JsonResponse($movies);
    }

    #[Route('/movies/detail/video', name: 'app_detail_video')]
    public function DetailMovies(Request $request): JsonResponse
    {
            $id = $request->query->get('id');
            $movies = $this->videoMovieHandler->handle($id);
        return new JsonResponse($movies);
    }

    #[Route('/movies/autocomplete', name: 'app_autocomplete')]
    public function autocomplete(Request $request): JsonResponse
    {
        $keywords = $request->request->get('with_keywords');
        $movies = $this->listingMovieHandle->handle('', $keywords);
        $response = [];
        foreach($movies as $movie) {
            $response[] = [
                "value" => $movie['id'],
                "text" => $movie['original_title']];
        }

        return new JsonResponse(['results' =>$response]);
    }

    #[Route('/movies/vote', name: 'app_vote')]
    public function vote(Request $request): JsonResponse
    {

        return new JsonResponse(['results' =>'']);
    }
}
