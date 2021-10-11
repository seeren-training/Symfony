<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{

    #[Route('/signin', name: 'auth_signin', methods: ['GET', 'POST'])]
    public function signin(): Response
    {
        return $this->render('auth/signin.html.twig');
    }

    #[Route('/logout', name: 'auth_logout', methods: ['GET', 'POST'])]
    public function logout(): Response
    {
        return $this->render('auth/logout.html.twig');
    }

}
