<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Form\MealType;
use App\Repository\MealRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{

    #[Route('/meal', name: 'meal', methods: ['GET'])]
    public function index(MealRepository $mealRepository): Response
    {
        if (!$this->getUser()) {
            throw new AccessDeniedException();
        }
        $mealList = $mealRepository->findAll();
        return $this->render('meal/index.html.twig', [
            'mealList' => $mealList
        ]);
    }

    #[Route('/meal/new', name: 'meal_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        MealRepository $mealRepository): Response
    {
        if (!$this->getUser()) {
            throw new AccessDeniedException();
        }
        $meal = new Meal();
        $form = $this->createForm(MealType::class, $meal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mealRepository->insert($meal);
            return $this->redirectToRoute('meal');
        }
        return $this->render('meal/new.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/meal/{id<[0-9]{1,11}>}', name: 'meal_show', methods: ['GET'])]
    public function show(Meal $meal): Response
    {
        if (!$this->getUser()) {
            throw new AccessDeniedException();
        }
        return $this->render('meal/show.html.twig', [
            'meal' => $meal,
        ]);
    }

}
