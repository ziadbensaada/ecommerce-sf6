<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/categories',name:'categorie_')]
class CategoriesController extends AbstractController
{
    #[Route('/{slug}', name: 'list')]
    public function list(Categories $category,ProductsRepository $productsRepository,Request $request): Response
    {
        $page=$request->query->getInt('page',1);
        $product=$productsRepository->findProductsPaginated($page,$category->getSlug(),2);

        return $this->render('categories/list.html.twig', [
            'category' => $category,
            'products'=>$product
        ]);
    }
}
