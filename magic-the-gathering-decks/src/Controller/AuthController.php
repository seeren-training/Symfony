<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{

    #[Route('/signin', name: 'auth_signin', methods: ['GET', 'POST'])]
    public function signin(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->getUser()
            ? $this->redirectToRoute('mtgd_index')
            : $this->render('auth/signin.html.twig', [
                'last_username' => $authenticationUtils->getLastUsername(),
                'error' => $authenticationUtils->getLastAuthenticationError(),
            ]);
    }

    #[Route('/signout', name: 'auth_logout', methods: ['GET'])]
    public function logout(): void
    {
    }

}
