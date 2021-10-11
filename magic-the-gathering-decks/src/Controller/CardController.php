<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/card')]
class CardController extends AbstractController
{

    #[Route('/', name: 'card_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('card/index.html.twig');
    }

}
