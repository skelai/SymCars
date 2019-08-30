<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/public", name="public_index")
     */
    public function index()
    {
        return $this->render('public/home.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }
}
