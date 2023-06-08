<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyAccountController extends AbstractController
{
    #[Route('/my/account', name: 'app_my_account')]
    public function index(): Response
    {
        $user=$this->getUser();
        return $this->render('my_account/index.html.twig', [
            'user' => $user,
        ]);
    }
}
