<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CategoriesRepository $catrepo): Response
    {
        return $this->render('main/index.html.twig', [
            'categories' => $catrepo->findBy([],[
                'categoriesorder'=>'asc'
            ]),
        ]);
    }
}
