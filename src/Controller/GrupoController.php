<?php

namespace App\Controller;

use App\Repository\GrupoRepository;
use App\Repository\RequisitoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GrupoController extends AbstractController
{

    /**
     * @Route("/grupos", name="grupo_listado")
     */
    public function listado(GrupoRepository $grupoRepository) : Response {
        $grupos = $grupoRepository->listar();

        return $this->render("grupo/listado.html.twig", [
            'grupos' => $grupos
        ]);
    }
}