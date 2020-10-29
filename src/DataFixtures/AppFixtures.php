<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'un nouvel objet faker
        $faker = Factory::create('fr_FR');

        // Création entre 15 et 30 tâches aléatoirement
        for ($t = 0; $t < mt_rand(15,30); $t++){

            // Création d'un nouvel objet Task
            $task = new Task;

            // On nourrit l'objet Task
            $task->setName($faker->sentence(6))
                ->setDescription($faker->paragraph(3))
                ->setCreatedAt(new \DateTime())
                ->setDueAt($faker->dateTimeBetween('now', '6 months'));

            // On fait persister les données
            $manager->persist($task);
        }

        // On push le tout en BDD
        $manager->flush();
    }
}
