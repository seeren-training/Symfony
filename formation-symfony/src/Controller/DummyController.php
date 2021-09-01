<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DummyController extends AbstractController
{

    #[Route('/dummy', name: 'dummy', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('dummy/index.html.twig', [
            'controller_name' => 'DummyController',
            'maVariable' => "maValeur"
        ]);
    }

    #[Route('/dummy/{id<[0-9]{1,11}>}', name: 'dummy_show')]
    public function show($id): Response
    {
        return $this->render('dummy/show.html.twig', [
            'controller_name' => 'DummyController',
            'maVariable' => "maValeur"
        ]);
    }

}
