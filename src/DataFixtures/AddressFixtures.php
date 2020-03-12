<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AddressFixtures extends Fixture
{
    public const CPAS_CHARLEROI_ADDRESS_REFERENCE = 'cpas-charleroi-address';

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        $address = new Address();
        $address
            ->setStreet("Boulevard Joseph II")
            ->setNumber(13)
            ->setPostalCode(6000)
            ->setCity("Charleroi");
        $manager->persist($address);
        $this->addReference(self::CPAS_CHARLEROI_ADDRESS_REFERENCE, $address);

        for ($i=0; $i < 100; $i++) {
            $address = new Address();
            $address
                ->setStreet($faker->streetName)
                ->setNumber($faker->buildingNumber)
                ->setPostalCode($faker->postcode)
                ->setCity($faker->city);
            $manager->persist($address);
            $this->addReference("address-" . $i, $address);
        }

        $manager->flush();
    }
}
