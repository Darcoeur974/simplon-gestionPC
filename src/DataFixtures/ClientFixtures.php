<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $client = new Client();
            $client->setFirstname('Client-FN-'.$i);
            $client->setLastname('Client-LN-'.$i);
            $manager->persist($client);
        }

        $manager->flush();
    }
}
