<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\ComputerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param ComputerRepository $computerRepository
     * @param ClientRepository $clientRepository
     * @return Response
     */
    public function __invoke(
        ComputerRepository $computerRepository, ClientRepository $clientRepository
    ) {
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
        ]);
    }
}
