<?php

namespace App\Service;

use App\Entity\Deck;
use App\Repository\DeckRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class DeckService
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private DeckRepository $deckRepository)
    {
    }

    public function deleteDeck(
        UserInterface $user,
        string $name): bool
    {
        $deck = $this->getDeck($user, $name);
        try {
            if (!$deck) {
                throw new \LogicException();
            }
            $this->entityManager->remove($deck);
            $this->entityManager->flush();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function addDeck(
        UserInterface $user,
        Deck $deck): bool
    {
        $deck->setUser($user);
        try {
            $this->entityManager->persist($deck);
            $this->entityManager->flush();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function getDecks(UserInterface $user): array
    {
        return $this->deckRepository->findByUser($user, [
            'id' => 'DESC'
        ]);
    }

    public function getDeck(
        UserInterface $user,
        string $name): ?Deck
    {
        return $this->deckRepository->findOneBy([
            'user' => $user,
            'name' => $name
        ]);
    }

}
