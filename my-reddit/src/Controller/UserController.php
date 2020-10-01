<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{

    /**
     * @Route("/user/new", name="user_new")
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param UserRepository $repo
     * @return Response
     */
    public function new(
        Request $request,
        UserPasswordEncoderInterface $encoder,
        UserRepository $repo
    ): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('post_show_all');
        }
        $user = new User();
        $form = $this->createForm(UserType::class, $user)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repo->upgradePassword($user, $encoder->encodePassword($user, $user->getPassword()));
            return $this->redirectToRoute("post_show_all");
        }
        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
