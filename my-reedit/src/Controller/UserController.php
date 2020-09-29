<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * @Route("/user/new", name="user_new")
     */
    public function new()
    {
        $obj = new \stdClass();
        $obj->hello = "world";

        return $this->render('user/new.html.twig', [
            'foo' => $obj,
        ]);
    }

    /**
     * @Route("/user/login", name="user_login")
     */
    public function login()
    {
        return $this->render('user/login.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logout()
    {
        return $this->render('user/logout.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
