<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/signup', name: 'user_new', methods: ['GET', 'POST'])]
    public function new(): Response
    {
        return $this->render('user/new.html.twig');
    }

}
