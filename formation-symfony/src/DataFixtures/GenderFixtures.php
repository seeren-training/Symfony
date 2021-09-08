<?php

namespace App\DataFixtures;

use App\Entity\Gender;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenderFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        foreach (["Femme", "Homme", "Autre"] as $name) {
            $gender = new Gender();
            $gender->setName($name);
            $manager->persist($gender);
        }
        $manager->flush();
    }

}
