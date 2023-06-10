<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Chanson;
use App\Entity\Artiste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use EsperoSoft\Faker\Faker;

class DiscothequeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = new Faker();

        $categories = [];
        for($i = 0; $i < 5; $i++){
            $categorie = (new Categorie())
            ->setNom($faker->word());

            $categories[] = $categorie; // On stocke dans un tableau pour tirage aléatoire plus tard
            $manager->persist($categorie);
        }

        $artiste = [];
        $genres=["Homme","Femme","Autre"];
        for($i = 0; $i < 20; $i++){
            $artiste = (new Artiste())
            ->setNom($faker->name())
            ->setPrenom($faker->firstName())
            ->setDateNaissance($faker->dateTimeImmutable())
            ->setBiographie($faker->description())
            ->setGenre($genres[rand(0, count($genres)-1)])
            // Tirage aléatoire d'une catégorie pour cet article
            ->setCategorie($categories[rand(0, count($categories)-1)]);

            $artistes[] = $artiste; // On stocke dans un tableau pour tirage aléatoire plus tard
            $manager->persist($artiste);
        }

        for($i = 0; $i < 50; $i++){
            $chanson = (new Chanson())
            ->setNom($faker->word())
            ->setDateSortie($faker->dateTimeImmutable());
            
            // Tirage aléatoire d'un ou plusieurs artistes pour cette chanson
            for($j = 0; $j < rand(1, 3); $j++){
                $chanson->addArtiste($artistes[rand(0, count($artistes)-1)]);
            }

            $manager->persist($chanson);
        }

        $manager->flush();
    }
}
