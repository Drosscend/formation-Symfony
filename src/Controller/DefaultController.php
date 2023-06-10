<?php 
namespace App\Controller; // répertoire de tous nos contrôleurs

use Symfony\Component\HttpFoundation\Response; // cette classe permet de faire des Response
use Symfony\Component\Routing\Annotation\Route; // cette classe 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // super-classe des Contrôleurs


class DefaultController extends AbstractController
{
    #[Route('/home/')] // on définit la route / (donc route par défaut de tout le site) pour cette fonction home
    public function home(): Response {
        return new Response('Hello Tandol Véronési'); // on ne fait qu'afficher son nom de famille
    }
  
  
    // on utilise les REGEX de PHP : https://www.php.net/manual/fr/book.pcre.php
    // \d signifie un caractère de type [0-9] et + signifie {1,}
    // methods: ['GET', 'HEAD']
    #[Route(
        '/random/{min}/{max}',
        requirements: ['min' => '\d+', 'max' => '\d+'],
        methods: ['GET', 'HEAD']
    )]    
    public function random(int $min, int $max): Response {
        return new Response(
            random_int($min, $max)
        );
    }




    
}
