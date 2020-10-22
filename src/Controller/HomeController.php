<?php

namespace App\Controller;

use App\form\ClientType;
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
        $formComputer = $this->createForm(ComputerType::class);
        $formClient = $this->createForm(ClientType::class);
        $formComputer->handleRequest($request);
        $formClient->handleRequest($request);

        $computers = $computerRepository->findAll();

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
            'formComputer' => $formComputer->createView(),
            'formClient' => $formClient->createView(),
        ]);
    }
}
