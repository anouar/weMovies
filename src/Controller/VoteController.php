<?php

namespace App\Controller;

use App\Application\Handler\Rating\RatingMovieHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VoteController extends AbstractController
{
    public function __construct(
        private readonly RatingMovieHandler $ratingMovieHandler
    ) {
    }

    #[Route('/movies/vote', name: 'app_vote')]
    public function vote(Request $request): JsonResponse
    {
        $response = [];
        if($request->isXmlHttpRequest()) {
            $movies_id = $request->request->get('movies_id');
            $response = $this->ratingMovieHandler->handle($movies_id);
        }
        return new JsonResponse($response);
    }
}
