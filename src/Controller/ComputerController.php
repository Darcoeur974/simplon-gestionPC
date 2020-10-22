<?php

namespace App\Controller;

use App\Entity\Computer;
use Junker\JsendResponse\Exceptions\JSendSpecificationViolation;
use Junker\JsendResponse\JSendFailResponse;
use Junker\JsendResponse\JSendSuccessResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComputerController extends AbstractController
{
    /**
     * @Route("/computer/new", name="computer.new", methods={"POST"})
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

        if (null != $request->request->get('name')) {
            $name = $request->request->get('name');

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist(
                (new Computer())
                    ->setName($name)
            );
            $entityManager->flush();

            return new JSendSuccessResponse(['created' => true], JSendSuccessResponse::HTTP_OK);
        }

        return new JSendFailResponse([
            'error' => 'Bad request.',
        ], JSendFailResponse::HTTP_BAD_REQUEST);
    }
}
