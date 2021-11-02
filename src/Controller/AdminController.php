<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    // /**
    //  * @Route("/admin", name="admin")
    //  */
    public function admin(): Response
    {
        return $this->render('listUsers.html.twig');
    }
}
