<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Form\MealType;
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
    public function new(Request $request): Response
    {
        $meal = new Meal();
        $form = $this->createForm(MealType::class, $meal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($meal);
            $em->flush();
        }
        return $this->render('meal/new.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/meal/{id<[0-9]{1,11}>}', name: 'meal_show', methods: ['GET'])]
    public function show($id, Request $req): Response
    {
        return $this->render('meal/show.html.twig', [
            'id' => $id,
        ]);
    }

}
