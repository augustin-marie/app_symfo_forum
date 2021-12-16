<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListPostController extends AbstractController
{
    private $postRepository;

    //#[Route('/', name: 'home')]
    public function index(PostRepository $postRepository): Response
    {
        $this->postRepository = $postRepository;
        //On sélectionne l'utilisateur
        $posts = $this->postRepository->findAll();



        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $posts,
        ]);
    }
}
