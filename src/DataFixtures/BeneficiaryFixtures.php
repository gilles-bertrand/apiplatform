<?php

namespace App\DataFixtures;

use App\Entity\Beneficiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BeneficiaryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $beneficiary = new Beneficiary();
        $beneficiary
            ->setFirstname("Jean")
            ->setLastname("Dupont");
        $manager->persist($beneficiary);

        $manager->flush();
    }
}
