<?php

namespace App\Controller;

use App\Entity\Grupo;
use App\Form\GrupoType;
use App\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GrupoController extends AbstractController
{

    /**
     * @Route("/grupo", name="grupo_listado")
     */
    public function listado(GrupoRepository $grupoRepository) : Response {
        $grupos = $grupoRepository->listar();

        return $this->render("grupo/listado.html.twig", [
            'grupos' => $grupos
        ]);
    }

    /**
     * @Route("/grupo/nuevo", name="grupo_nuevo")
     */
    public function nuevo(Request $request, GrupoRepository $grupoRepository) : Response {
        $grupo = $grupoRepository->nuevo();
        return $this->modificar($request, $grupoRepository, $grupo);
    }

    /**
     * @Route("/grupo/modificar/{id}", name="grupo_modificar")
     */
    public function modificar(Request $request, GrupoRepository $grupoRepository, Grupo $grupo)
    {
        $form = $this->createForm(GrupoType::class, $grupo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $grupoRepository->guardar();
                return $this->redirectToRoute('grupo_listado');
            } catch (\Exception $exception) {

            }
        }

        return $this->render('grupo/modificar.html.twig', [
            'grupo' => $grupo,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/grupo/eliminar/{id}", name="grupo_eliminar")
     */
    public function eliminar(Request $request, GrupoRepository $grupoRepository, Grupo $grupo) : Response {
        if ($request->get('confirmar', false)) {
            try {
                $grupoRepository->eliminar($grupo);
                return $this->redirectToRoute('grupo_listado');
            } catch (\Exception $e) {

            }
        }
        return $this->render('grupo/eliminar.html.twig', [
            'grupo' => $grupo
        ]);
    }
}