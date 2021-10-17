<?php

namespace App\Controller;

use App\Entity\Deck;
use App\Form\DeckType;
use App\Repository\DeckRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(DeckRepository $deckRepository): Response
    {
        return $this->render('deck/index.html.twig', [
            'decks' => $deckRepository->findByUser($this->getUser(), [
                'id' => 'DESC'
            ])
        ]);
    }

    #[Route('/new', name: 'deck_new', methods: ['GET', 'POST'])]
    public function new(
        Request                $request,
        EntityManagerInterface $manager): Response
    {
        $deck = new Deck();
        $form = $this->createForm(DeckType::class, $deck)->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($deck->setUser($this->getUser()));
            $manager->flush();
            return $this->redirectToRoute('deck_index');
        }
        return $this->render('deck/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{name<.{1,256}>}/delete', name: 'deck_delete', methods: ['GET'])]
    public function delete(
        string                 $name,
        DeckRepository         $deckRepository,
        EntityManagerInterface $entityManager): Response
    {
        $deck = $deckRepository->findOneBy([
            'user' => $this->getUser(),
            'name' => $name
        ]);
        if ($deck) {
            $entityManager->remove($deck);
            $entityManager->flush();
        }
        return $this->redirectToRoute('deck_index');
    }

    #[Route('/{name<.{1,256}>}', name: 'deck_show', methods: ['GET'])]
    public function show(
        string         $name,
        DeckRepository $deckRepository): Response
    {
        $deck = $deckRepository->findOneBy([
            'user' => $this->getUser(),
            'name' => $name
        ]);
        return !$deck
            ? $this->redirectToRoute('deck_index')
            : $this->render('deck/show.html.twig', [
                'deck' => $deck
            ]);
    }

}
