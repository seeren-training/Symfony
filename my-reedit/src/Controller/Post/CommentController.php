<?php

namespace App\Controller\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{

    /**
     * @Route("/post/{id<\d+>}/comments", name="post_comment_show_all")
     */
    public function showAll(int $id)
    {
        return $this->render('post/comment/show_all.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}/comment/new", name="post_comment_new")
     */
    public function new(int $id)
    {
        return $this->render('post/comment/new.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

}
