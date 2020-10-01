<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class PostController extends AbstractController
{

    /**
     * @Route("/", name="post_show_all")
     *
     * @return Response
     */
    public function showAll(): Response
    {
        return $this->render('post/show_all.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/post/{id<\d+>}", name="post_show")
     *
     * @return Response
     */
    public function show(): Response
    {
        return $this->render('post/show.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/post/new", name="post_new")
     *
     * @return Response
     */
    public function new(): Response
    {
        return $this->render('post/new.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

}
