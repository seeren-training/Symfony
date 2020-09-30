<?php

namespace App\Controller\Post;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VoteController extends AbstractController
{

    /**
     * @Route("/post/{id<\d+>}/vote/down", name="post_vote_down")
     */
    public function down(nt $id)
    {
        return $this->render('post/vote/down.html.twig', [
            'controller_name' => 'VoteController',
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}/vote/up", name="post_vote_up")
     */
    public function up(nt $id)
    {
        return $this->render('post/vote/up.html.twig', [
            'controller_name' => 'VoteController',
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}/vote", name="post_vote_show")
     */
    public function show(int $id)
    {
        return $this->render('post/vote/show.html.twig', [
            'controller_name' => 'VoteController',
        ]);
    }

}