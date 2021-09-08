<?php

namespace App\Controller;

use App\Entity\Meal;
use App\Form\MealType;
use App\Repository\CategoryRepository;
use App\Repository\MealRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{

    #[Route('/meal', name: 'meal', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function index(
        Request            $request,
        MealRepository     $mealRepository,
        CategoryRepository $categoryRepository): Response
    {
        $categoryName = $request->get("category");
        return $this->render('meal/index.html.twig', [
            'categoryList' => $categoryRepository->findAll(),
            'categoryName' => $categoryName,
            'mealList' => $categoryName
                ? $categoryRepository->findOneByName($categoryName)->getMeals()->getValues()
                : $mealRepository->findAll(),
        ]);
    }

    #[Route('/meal/new', name: 'meal_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function new(
        Request        $request,
        MealRepository $mealRepository): Response
    {
        $meal = new Meal();
        $form = $this->createForm(MealType::class, $meal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $meal->setCreatedBy($this->getUser());
            $mealRepository->insert($meal);
            return $this->redirectToRoute('meal');
        }
        return $this->render('meal/new.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/meal/{id<[0-9]{1,11}>}', name: 'meal_show', methods: ['GET'])]
    #[IsGranted('ROLE_USER')]
    public function show(Meal $meal): Response
    {
        return $this->render('meal/show.html.twig', [
            'meal' => $meal,
        ]);
    }

}
