<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Type extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $types = [
            "Artifact",
            "Conspiracy",
            "Creature",
            "Enchantment",
            "Instant",
            "Land",
            "Phenomenon",
            "Plane",
            "Planeswalker",
            "Scheme",
            "Sorcery",
            "Tribal",
            "Vanguard",
        ];
        foreach ($types as $type) {
            $entity = new \App\Entity\Type();
            $manager->persist($entity);
        }
        $manager->flush();
    }
}
