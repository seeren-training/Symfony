<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{

    #[Route('/meal', name: 'meal', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('meal/index.html.twig');
    }

    #[Route('/meal/new', name: 'meal_new', methods: ['GET', 'POST'])]
    public function new(): Response
    {
        return $this->render('meal/new.html.twig');
    }

    #[Route('/meal/{id<[0-9]{1,11}>}', name: 'meal_show', methods: ['GET'])]
    public function show($id, Request $req): Response
    {
        return $this->render('meal/show.html.twig', [
            'id' => $id,
        ]);
    }

}
