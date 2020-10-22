<?php

namespace App\Controller;

use App\form\ComputerType;
use App\Repository\ClientRepository;
use App\Repository\ComputerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @return Response
     */
    public function __invoke(
        Request $request, ComputerRepository $computerRepository, ClientRepository $clientRepository
    ) {
        $form = $this->createForm(ComputerType::class);
        $form->handleRequest($request);

        $computers = $computerRepository->findAll();
        $clients = $clientRepository->findAll();

        $hours = [
            '8h',
            '9h',
            '10h',
            '11h',
            '12h',
            '13h',
            '14h',
            '15h',
            '16h',
            '17h',
        ];

        return $this->render('homepage.html.twig', [
            'computers' => $computers,
            'hours' => $hours,
            'form' => $form->createView(),
        ]);
    }
}
