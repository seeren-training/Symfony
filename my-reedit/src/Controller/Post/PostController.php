<?php

namespace App\Controller\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{

    /**
     * @Route("/", name="post_show_all")
     */
    public function showAll()
    {
        return $this->render('post/post/show_all.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}", name="post_show")
     */
    public function show(int $id)
    {



        return $this->render('post/post/show.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/post/new", name="post_new")
     */
    public function new()
    {
        return $this->render('post/post/new.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

}
