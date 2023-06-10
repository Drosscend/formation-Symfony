<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class BlogController extends AbstractController
{
    #[Route('/blog/{id}/{name}', name: 'app_blog', requirements: ['name' => '[a-zA-Z]{2,6}'])]
    public function index(int $id, string $name): Response
    {
        return $this->render('blog/index.html.twig', [
            'id' => $id,
            'name' => $name
        ]);
    }

    // #[Route('/', name: 'hello_world')]
    // public function helloWorld(): Response
    // {
    //     return new Response('Hello World !');
    // }

    #[Route('/', name: 'app_helo')]
    public function hello(ArticleRepository $repoArticle, CategoryRepository $repoCategory): Response
    {
        $articles = $repoArticle->findAll();
        // $categories = $repoCategory->findAll();
        // dd($articles); // dd signifie dump and die donc affichage "brut" et arrêt de l'execution
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles,
            // 'categories' => $categories
        ]);
    }

    // #[Route('/article/{id}', name: 'app_single_article_id')]
    // public function singleId(ArticleRepository $repoArticle, $id): Response
    // {
    //     $article = $repoArticle->findOneById($id);
    //     return $this->render('blog/single.html.twig', [
    //         'controller_name' => 'BlogController',
    //         'article' => $article,
    //     ]);
    // }

    // #[Route('/article/{id}', name: 'app_single_article_id')]
    // #[ParamConverter('article', class: 'App\Entity\Article')]
    // public function singleId2(ArticleRepository $repoArticle, $article): Response
    // {
    //     return $this->render('blog/single.html.twig', [
    //         'controller_name' => 'BlogController',
    //         'article' => $article,
    //     ]);
    // }

    #[Route('/article/{slug}', name: 'app_single_article')]
    public function single(ArticleRepository $repoArticle, CategoryRepository $repoCategory, string $slug): Response
    {
        $article = $repoArticle->findOneBySlug($slug);
        // $categories = $repoCategory->findAll();
        return $this->render('blog/single.html.twig', [
            'controller_name' => 'BlogController',
            'article' => $article,
            // 'categories' => $categories
        ]);
    }

    #[Route('/category/{slug}', name: 'app_articles_by_category')]
    public function app_articles_by_category(ArticleRepository $repoArticle, CategoryRepository $repoCategory, string $slug): Response
    {
        $category = $repoCategory->findOneBySlug($slug);
        $articles = [];
        if ($category) {
            $articles = $category->getArticles();
        }
        // $categories = $repoCategory->findAll();
        return $this->render('blog/articles_by_category.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles,
            // 'categories' => $categories,
            'category' => $category,
        ]);
    }

    public function getCateg(CategoryRepository $repoCat) {
        $categories = $repoCat->findAll();
        return $this->render('blog/listeCateg.html.twig', 
            ['categories' => $categories ]
        ); 
    }

}
