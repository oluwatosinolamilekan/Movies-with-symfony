<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    public function __construct(
        public EntityManagerInterface $em,
    ) {}

    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        $title  = 'Luqman';
        $movies = $this->em->getRepository(Movie::class)->findAll();
        return $this->json([
            'data' => $movies
        ]);
//        return $this->render('index.html.twig',compact('title','movies'));
    }
    #[Route('/all', name: 'all')]
    public function all(): Response
    {
        $movies = count($this->em->getRepository(Movie::class)->findAll());
        return $this->json([
           'data' => $movies
        ]);
//        return $this->render('index.html.twig',compact('title','movies'));
    }


}
