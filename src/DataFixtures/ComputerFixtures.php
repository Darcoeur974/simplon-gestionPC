<?php

namespace App\DataFixtures;

use App\Entity\Computer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ComputerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; ++$i) {
            $computer = new Computer();
            $computer->setName('Ordinateur-'.$i);
            $manager->persist($computer);
        }

        $manager->flush();
    }
}
