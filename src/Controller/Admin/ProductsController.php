<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use App\Form\ProductsFormType;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin/products',name:'admin_products_')]
class ProductsController extends AbstractController{
    #[Route('/',name:'index')]
    public function index(ProductsRepository $productsRepository):Response
    {
        $products=$productsRepository->findAll();
        return $this->render('admin/products/index.html.twig',[
            'products'=>$products
        ]);
    }

    #[Route('/add',name:'add')]
    public function add(Request $request,EntityManagerInterface $em,SluggerInterface $slugger):Response
    {
        //Create new product
        $product=new Products();
        //Create Form
        $productForm=$this->createForm(ProductsFormType::class,$product);
        //request Form
        $productForm->handleRequest($request);
        if($productForm->isSubmitted() && $productForm->isValid()){
            $slug=$slugger->slug($product->getName());
            $product->setSlug($slug);
            $em->persist($product);
            $em->flush();
            $this->addFlash('success','The product added successfuly!');
            return $this->redirectToRoute('admin_products_index');
        }
        return $this->render('admin/products/add.html.twig',[
        'productForm'=>$productForm->createView()
        ]);
    }
    #[Route('/edit/{id}',name:'edit')]
    public function edit(Products $product,Request $request,EntityManagerInterface $em,SluggerInterface $slugger):Response
    {
        //Create Form
        $productForm=$this->createForm(ProductsFormType::class,$product);
        //request Form
        $productForm->handleRequest($request);
        if($productForm->isSubmitted() && $productForm->isValid()){
            $slug=$slugger->slug($product->getName());
            $product->setSlug($slug);
            $em->persist($product);
            $em->flush();
            $this->addFlash('success','The product Edited successfuly!');
            return $this->redirectToRoute('admin_products_index');
        }
        return $this->render('admin/products/edit.html.twig',[
        'productForm'=>$productForm->createView()
        ]);
    }
    #[Route('/delete/{id}',name:'delete')]
    public function delete(Products $product):Response
    {
        return $this->render('admin/products/index.html.twig');
    }
}