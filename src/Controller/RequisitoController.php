<?php

namespace App\Controller;

use App\Repository\RequisitoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RequisitoController extends AbstractController
{

    /**
     * @Route("/requisitos", name="requisito_listado")
     */
    public function listado(RequisitoRepository $requisitoRepository) : Response {
        $requisitos = $requisitoRepository->listar();

        return $this->render("requisito/listado.html.twig", [
            'requisitos' => $requisitos
        ]);
    }
}