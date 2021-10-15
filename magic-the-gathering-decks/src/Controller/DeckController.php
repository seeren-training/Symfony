<?php

namespace App\Controller;

use App\Entity\Deck;
use App\Form\DeckType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/deck')]
#[IsGranted('ROLE_USER')]
class DeckController extends AbstractController
{

    #[Route('/', name: 'deck_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('deck/index.html.twig');
    }

    #[Route('/new', name: 'deck_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $deck = new Deck();
        $form = $this->createForm(DeckType::class, $deck);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump('Save the deck');
        }
        return $this->render('deck/new.html.twig', [
            'form' => $form->createView()
        ]);
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
