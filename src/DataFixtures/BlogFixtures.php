<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Address;
use App\Entity\Article;
use App\Entity\Profile;
use App\Entity\Category;
use EsperoSoft\Faker\Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    //     $faker = new Faker();
    //     $users = [];
    //     for($i = 0; $i < 100; $i++){
    //         $user = (new User())->setFullName($faker->full_name())
    //                             ->setEmail($faker->email())
    //                             ->setPassword(sha1("leMotDePasse"))
    //                             ->setCreatedAt($faker->dateTimeImmutable());
    //         $address = (new Address())->setStreet($faker->streetAddress())
    //                                   ->setCodePostal($faker->codepostal())
    //                                   ->setCity($faker->city())
    //                                   ->setCountry($faker->country())
    //                                   ->setCreatedAt($faker->dateTimeImmutable());
    //         $profile = (new Profile())->setPicture($faker->image())
    //                                   ->setCoverPicture($faker->image())
    //                                   ->setDescription($faker->description(60))
    //                                   ->setDateBirth($faker->dateTimeImmutable())
    //                                   ->setCreatedAt($faker->dateTimeImmutable());
    //         $user->addAddress($address);
    //         $user->setProfile($profile);
    //         $users[] = $user; // On stocke dans un tableau pour tirage aléatoire plus tard
    //         $manager->persist($address);
    //         $manager->persist($profile);
    //         $manager->persist($user);
    //     }

    //     $categories = [];
    //     for($i = 0; $i < 10; $i++){
    //         $category = (new Category())->setName($faker->description(30))
    //                                     ->setDescription($faker->description(60))
    //                                     ->setImageUrl($faker->image())
    //                                     ->setCreatedAt($faker->dateTimeImmutable());
    //         $categories[] = $category; // On stocke dans un tableau pour tirage aléatoire plus tard
    //         $manager->persist($category);
    //     }

    //     for($i = 0; $i < 300; $i++){
    //         $article = (new Article())->setTitle($faker->description(30))
    //                                     ->setContent($faker->text(5,10))
    //                                     ->setImageUrl($faker->image())
    //                                     ->setCreatedAt($faker->dateTimeImmutable())
    //                                     ->setAuthor($users[rand(0, count($users)-1)]) // Tirage aléatoire d'un auteur/user pour cet article
    //                                     ->addCategory($categories[rand(0, count($categories)-1)]); // Tirage aléatoire d'une catégorie pour cet article
    //         $manager->persist($article);
        // }
        $manager->flush();
    }
}
