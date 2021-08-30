<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DummyController extends AbstractController
{
    #[Route('/dummy', name: 'dummy', methods: ['POST'])]
    public function index(): Response
    {
        return $this->render('dummy/new.html.twig', [
            'controller_name' => 'DummyController',
            'maVariable' => "maValeur"
        ]);
    }

    #[Route('/dummy/{id<[0-9]{1,11}>}', name: 'dummy_show')]
    public function show($id): Response
    {
        var_dump($id);
        return $this->render('dummy/new.html.twig', [
            'controller_name' => 'DummyController',
            'maVariable' => "maValeur"
        ]);
    }

}
