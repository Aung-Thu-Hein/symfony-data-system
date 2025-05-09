<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PostController extends AbstractController
{

    #[Route('/post/{id}', name: 'post_index', methods: ['GET'])]
    public function index(int $id, PostRepository $postRepository)
    {
        $post = $postRepository->getPostWithComments($id);
        dd($post->getComments());
    }

    #[Route('/post/create', name: 'post_create', methods: ['GET'])]
    public function create(): Response
    {
        return $this->render('post/create.html.twig');
    }

    #[Route('/post/store', name: 'post_store', methods: ['POST'])]
    public  function store(): Response
    {
        return $this->render('post/store.html.twig');
    }
}
