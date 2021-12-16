<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\PostRepository;
use App\Entity\User;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $postRepository;

    #[Route('/', name: 'home')]
    public function index(PostRepository $postRepository): Response
    {
        $this->postRepository = $postRepository;
        //On sélectionne l'utilisateur
        $posts = $this->postRepository->findAll();



        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts,
        ]);
    }
}
