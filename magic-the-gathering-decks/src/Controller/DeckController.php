<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/deck')]
class DeckController extends AbstractController
{

    #[Route('/', name: 'deck_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('deck/index.html.twig');
    }

    #[Route('/new', name: 'deck_new', methods: ['GET', 'POST'])]
    public function new(): Response
    {
        return $this->render('deck/new.html.twig');
    }

    #[Route('/{name<\w{1,256}>}', name: 'deck_show', methods: ['GET'])]
    public function show($name): Response
    {
        return $this->render('deck/show.html.twig');
    }

    #[Route('/{name<\w{1,256}>}/delete', name: 'deck_delete', methods: ['GET'])]
    public function delete($name): Response
    {
        return $this->render('deck/delete.html.twig');
    }

}
