<?php

namespace App\DataFixtures;

use App\Entity\Beneficiary;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class BeneficiaryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_BE');

        for ($i=0; $i < 100; $i++) { 
            $beneficiary = new Beneficiary();
            $beneficiary
                ->setLastname($faker->lastName)
                ->addAddress($this->getReference("address-" . $i));
            
            if ($i<50) {
                $beneficiary
                    ->setFirstname($faker->firstNameMale)
                    ->setSex($this->getReference(SexFixture::HOMME_REFERENCE));
                
            } else {
                $beneficiary
                    ->setFirstname($faker->firstNameFemale)
                    ->setSex($this->getReference(SexFixture::FEMME_REFERENCE));
                
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
