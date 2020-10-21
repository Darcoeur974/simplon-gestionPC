<?php

namespace App\Controller;

use App\form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        return $this->render('login.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
