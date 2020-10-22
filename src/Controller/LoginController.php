<?php

namespace App\Controller;

use App\form\LoginType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     *
     * @return Response
     */
    public function index(Request $request, UserRepository $userRepository)
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $data = $request->request->get('login');
            $email = $data['email'];
            $password = $data['password'];

            $user = $userRepository->findBy([
                'email' => $email,
            ]);

            if ($user[0]->getPassword() === $password) {
                return $this->redirect('/');
            }

        }

        return $this->render('login.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
