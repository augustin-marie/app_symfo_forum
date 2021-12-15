<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewPostController extends AbstractController
{
    #[Route('/new/post', name: 'new_post')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(PostType::class);
        $form -> handleRequest($request);

        return $this->render('new_post/index.html.twig', [
            'controller_name' => 'NewPostController',
            'form' => $form->createView(),
        ]);
    }
}
