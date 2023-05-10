<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création d'une dizaine d'offre
        for ($i = 0; $i < 10; $i++) {
            $offre = new Offer;
            $offre->setTitle('standard' . $i);
            $offre->setDescription('SoftWare PHP 5 à 7, Softaculous, apache, Mysql, website Builder,Phpmyadmin' . $i);
            $offre->setReduction(30 . $i);
            $offre->setPrice(30000 . $i);
            $offre->setPriority('low' . $i);
            $offre->setRenewalPayement(25000 . $i);
            $offre->setType('vps' . $i);
            
            $manager->persist($offre);
        }
         // Création d'une dizaine d'offre
         for ($i = 0; $i < 10; $i++) {
            $offre = new Offer;
            $offre->setTitle('Premium' . $i);
            $offre->setDescription('SoftWare PHP 5 à 7, Softaculous, apache, Mysql, website Builder,Phpmyadmin' . $i);
            $offre->setReduction(45 . $i);
            $offre->setPrice(60000 . $i);
            $offre->setPriority('low' . $i);
            $offre->setRenewalPayement(43223 . $i);
            $offre->setType('mutualized' . $i);
            
            $manager->persist($offre);
        }

        $manager->flush();
    }
}