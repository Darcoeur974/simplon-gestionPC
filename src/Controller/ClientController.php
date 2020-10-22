<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Computer;
use Junker\JsendResponse\Exceptions\JSendSpecificationViolation;
use Junker\JsendResponse\JSendFailResponse;
use Junker\JsendResponse\JSendSuccessResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/new", name="client.new", methods={"POST"})
     *
     * @return Response
     *
     * @throws JSendSpecificationViolation
     */
    public function index(Request $request)
    {
        if (!$request) {
            return new JSendFailResponse([
                'error' => 'Bad request.',
            ], JSendFailResponse::HTTP_BAD_REQUEST);
        }

        $client = $request->request->get('client');

        if (null != $client) {
            $lastname = $client['lastname'];
            $firstname = $client['firstname'];

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist(
                (new Client())
                    ->setLastname($lastname)
                    ->setFirstname($firstname)
            );
            $entityManager->flush();

            return new JSendSuccessResponse(['created' => true], JSendSuccessResponse::HTTP_OK);
        }

        return new JSendFailResponse([
            'error' => 'Bad request.',
        ], JSendFailResponse::HTTP_BAD_REQUEST);
    }
}
