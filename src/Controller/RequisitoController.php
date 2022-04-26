<?php

namespace App\Controller;

use App\Entity\Requisito;
use App\Form\RequisitoType;
use App\Repository\RequisitoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/requisito/nuevo", name="requisito_nuevo")
     */
    public function nuevo(Request $request, RequisitoRepository $requisitoRepository) : Response {
        $requisito = $requisitoRepository->nuevo();
        return $this->modificar($request, $requisitoRepository, $requisito);
    }

    /**
     * @Route("/requisito/modificar/{id}", name="requisito_modificar")
     */
    public function modificar(Request $request, RequisitoRepository $requisitoRepository, Requisito $requisito)
    {
        $form = $this->createForm(RequisitoType::class, $requisito);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $requisitoRepository->guardar();
                return $this->redirectToRoute('requisito_listado');
            } catch (\Exception $exception) {

            }
        }

        return $this->render('requisito/modificar.html.twig', [
            'requisito' => $requisito,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/requisito/eliminar/{id}", name="requisito_eliminar")
     */
    public function eliminar(Request $request, RequisitoRepository $requisitoRepository, Requisito $requisito) : Response {
        if ($request->get('confirmar', false)) {
            try {
                $requisitoRepository->eliminar($requisito);
                return $this->redirectToRoute('requisito_listado');
            } catch (\Exception $e) {

            }
        }
        return $this->render('requisito/eliminar.html.twig', [
            'requisito' => $requisito
        ]);
    }
}