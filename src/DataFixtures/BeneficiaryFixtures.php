<?php

namespace App\DataFixtures;

use App\Entity\Beneficiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BeneficiaryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 100; $i++) { 
            $beneficiary = new Beneficiary();
            $beneficiary
                ->setFirstname("Jean" . $i)
                ->setLastname("Dupont" . $i)
                ->addAddress($this->getReference(AddressFixtures::CPAS_CHARLEROI_ADDRESS_REFERENCE));
            if ($i<50) {
                $beneficiary->setSex($this->getReference(SexFixture::HOMME_REFERENCE));
            } else {
                $beneficiary->setSex($this->getReference(SexFixture::FEMME_REFERENCE));
            }
            $manager->persist($beneficiary);

            unset($beneficiary);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            SexFixture::class,
            AddressFixtures::class,
        );
    }
}
