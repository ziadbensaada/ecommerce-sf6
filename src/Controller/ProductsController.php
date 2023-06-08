<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/products',name:'products_')]
class ProductsController extends AbstractController{
    #[Route('/',name:'index')]
    public function index():Response
    {
        return $this->render('products/index.html.twig');
    }
    #[Route('/{slug}',name:'details')]
    public function details(Products $product){
        return $this->render('products/details.html.twig',compact('product'));
    }
}