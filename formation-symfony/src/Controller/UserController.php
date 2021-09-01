<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/user/new', name: 'user_new', methods: ['GET', 'POST'])]
    public function new(): Response
    {
        return $this->render('user/new.html.twig');
    }

    #[Route('/user/login', name: 'user_login', methods: ['GET', 'POST'])]
    public function login(): Response
    {
        return $this->render('user/login.html.twig');
    }

    #[Route('/user/{id<[0-9]{1,11}>}', name: 'user_show', methods: ['GET'])]
    public function show($id): Response
    {
        return $this->render('user/show.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route('/user/edit', name: 'user_edit', methods: ['GET', 'POST'])]
    public function edit(): Response
    {
        $profile = new Profile();
        $form = $this->createForm(ProfileType::class, $profile);
        return $this->render('user/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

}
