<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Form\RegistrationFormType;
use App\Repository\UsersRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/admin/users',name:'admin_users_')]
class UsersController extends AbstractController{
    #[Route('/',name:'index')]
    public function index(UsersRepository $usersRepository):Response
    {
        $users=$usersRepository->findBy([],['firstname'=>'asc']);
        return $this->render('admin/users/index.html.twig',[
            'users'=>$users
        ]);
    }
    #[Route('/edit/{id}',name:'edit')]
    public function edit(Users $user,Request $request,EntityManagerInterface $em):Response
    {
        //Create Form
        $userForm=$this->createForm(RegistrationFormType::class,$user);
        //request Form
        $userForm->handleRequest($request);
        if($userForm->isSubmitted() && $userForm->isValid()){
            $em->persist($user);
            $em->flush();
            $this->addFlash('success','The user Edited successfuly!');
            return $this->redirectToRoute('admin_users_index');
        }
        return $this->render('admin/users/edit.html.twig',[
        'registrationForm'=>$userForm->createView()
        ]);
    }
}