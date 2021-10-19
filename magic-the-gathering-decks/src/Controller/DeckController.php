<?php

namespace App\Controller;

use App\Entity\Deck;
use App\Form\DeckType;
use App\Service\DeckService;
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
    public function index(DeckService $deckService): Response
    {
        return $this->render('deck/index.html.twig', [
            'decks' => $deckService->getDecks($this->getUser())
        ]);
    }

    #[Route('/new', name: 'deck_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        DeckService $deckService): Response
    {
        $deck = new Deck();
        $form = $this->createForm(DeckType::class, $deck)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $deckService->addDeck($this->getUser(), $deck);
            return $this->redirectToRoute('deck_index');
        }
        return $this->renderForm('deck/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/{name<.{1,256}>}/delete', name: 'deck_delete', methods: ['GET'])]
    public function delete(
        string $name,
        Request $request,
        DeckService $deckService): Response
    {
        if ($this->isCsrfTokenValid('deck_delete', $request->query->get('token'))) {
            $deckService->deleteDeck($this->getUser(), $name);
        }
        return $this->redirectToRoute('deck_index');
    }

    #[Route('/{name<.{1,256}>}', name: 'deck_show', methods: ['GET'])]
    public function show(
        string $name,
        DeckService $deckService): Response
    {
        $deck = $deckService->getDeck($this->getUser(), $name);
        return !$deck
            ? $this->redirectToRoute('deck_index')
            : $this->render('deck/show.html.twig', [
                'deck' => $deck
            ]);
    }

}
