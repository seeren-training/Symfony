<?php

namespace App\Controller;

use App\Entity\Profile;
use App\Form\ProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class UserController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/user/{id<[0-9]{1,11}>}', name: 'user_show', methods: ['GET'])]
    public function show($id): Response
    {
        return $this->render('user/show.html.twig', [
            'id' => $id,
        ]);
    }

    #[IsGranted('ROLE_USER')]
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
