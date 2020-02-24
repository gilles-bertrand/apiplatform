<?php

namespace App\DataFixtures;

use App\Entity\Sex;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SexFixture extends Fixture
{
    public const HOMME_REFERENCE = 'homme-reference';
    public const FEMME_REFERENCE = 'femme-reference';

    public function load(ObjectManager $manager)
    {
        $sex = new Sex();
        $sex->setTitle("HOMME");
        $manager->persist($sex);
        $this->addReference(self::HOMME_REFERENCE, $sex);
        unset($sex);

        $sex = new Sex();
        $sex->setTitle("FEMME");
        $manager->persist($sex);
        $this->addReference(self::FEMME_REFERENCE, $sex);
        unset($sex);

        $manager->flush();
    }
}
