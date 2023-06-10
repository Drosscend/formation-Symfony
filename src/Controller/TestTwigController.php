<?php

namespace App\Controller;

use EsperoSoft\Faker\Faker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestTwigController extends AbstractController
{
    #[Route('/test/twig', name: 'app_test_twig')]
    public function index(): Response
    {
        $faker = new Faker();
        $users = [];

        for ($i=0; $i < 3; $i++){
            $user = [
                'full_name' => $faker->full_name(),
                'email' => $faker->email(),
                'age' => rand(4,60),
                'address' => [
                    'street' => $faker->streetAddress(),
                    'code_postal' => $faker->codePostal(),
                    'city' => $faker->city(),
                    'country' => $faker->country(),
                ],
                'picture' => $faker->image(),
                'cover' => $faker->image(),
                'createdAt' => $faker->dateTime(),
            ];
            $users[$i] = $user;
        }

        return $this->render('test_twig/index.html.twig', [
            'title' => 'page accueil',
            'users' => $users,
        ]);
    }
}
