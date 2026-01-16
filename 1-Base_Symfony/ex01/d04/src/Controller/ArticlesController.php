<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticlesController extends AbstractController
{

    #[Route('/e01', name: 'main_directory')]
    public function list(): Response
    {
        $categories = $this->getParameter('app.categories');
        return $this->render('articles/index.html.twig', [
            'categories' => $categories,
        ]);
    }
    
    #[Route('/e01/{article}', name: 'app_articles')]
    public function index(string $article): Response
    {
        $categories = $this->getParameter('app.categories');

        if (!in_array($article, $categories, true))
        {
            return $this->redirectToRoute('main_directory');
        }

        return $this->render('articles/$article.html.twig', [
            'article' => $article,
        ]);

    }

    

}

