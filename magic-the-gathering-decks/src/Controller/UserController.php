<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    #[Route('/signup', name: 'user_new', methods: ['GET', 'POST'])]
    public function register(
        Request     $request,
        UserService $userService): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('mtgd_index');
        }
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userService->addUser($user, $form->get('plainPassword')->getData());
            return $this->redirectToRoute('mtgd_index');
        }
        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
