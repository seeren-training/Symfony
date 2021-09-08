<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\Entity\UserEntityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{

    #[Route('/register', name: 'register')]
    public function register(
        Request           $request,
        UserEntityService $userEntityService): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }
        $user = new User();
        $form = $this
            ->createForm(RegistrationFormType::class, $user)
            ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userEntityService->insertRegistrationForm($form);
            return $this->redirectToRoute('login');
        }
        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
