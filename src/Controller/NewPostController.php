<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\PostType;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewPostController extends AbstractController
{
    private $userRepository;

    #[Route('/new/post', name: 'new_post')]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $this->userRepository = $userRepository;
        //On sélectionne l'utilisateur
        $user = $this->userRepository->findOneBy(['id' => 1]);
        
        $form = $this->createForm(PostType::class);
        $form -> handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()){
            $data = [
                "text" => $form["Text"]->getData(),
            ];

            $post = new Post;
            $post   ->setIdUtilisateur($user)
                    ->setText($data["text"])
                    ->setUpVotes(0)
                    ->setDownVotes(0);

            $elem = $this->getDoctrine()->getManager();
            $elem->persist($post);
            $elem->flush();
        }
        

        return $this->render('new_post/index.html.twig', [
            'controller_name' => 'NewPostController',
            'form' => $form->createView(),
        ]);
    }
}
