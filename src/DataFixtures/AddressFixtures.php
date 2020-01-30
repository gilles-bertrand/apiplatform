<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AddressFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();
        $address
            ->setStreet("Boulevard Joseph II")
            ->setNumber(13)
            ->setPostalCode(6000)
            ->setCity("Charleroi");
        $manager->persist($address);

        $manager->flush();
    }
}
