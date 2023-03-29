<?php

namespace App\DataFixtures;

use App\Entity\Chapters;
use App\Entity\Formations;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class ChaptersFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {   
        $formations = $manager->getRepository(Formations::class)->findall();
        $chapters = new Chapters();
        $chapters->setTitle('chapitre 1');
        $chapters->setFormationId($formations->getId());
        $manager->persist($chapters);

        $chapters = new Chapters();
        $chapters->setTitle('chapitre 2');
        $chapters->setFormationId($formations->getId());
        $manager->persist($chapters);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            FormationFixtures::class
        ];
    }
}