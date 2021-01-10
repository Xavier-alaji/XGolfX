<?php

namespace App\Controller;

use App\Entity\Shot;
use App\Form\ShotType;
use App\Repository\ShotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/shot")
 */
class ShotController extends AbstractController
{
    /**
     * @Route("/", name="shot_index", methods={"GET"})
     */
    public function index(ShotRepository $shotRepository): Response
    {
        return $this->render('shot/index.html.twig', [
            'shots' => $shotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="shot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $shot = new Shot();
        $form = $this->createForm(ShotType::class, $shot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($shot);
            $entityManager->flush();

            return $this->redirectToRoute('shot_index');
        }

        return $this->render('shot/new.html.twig', [
            'shot' => $shot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="shot_show", methods={"GET"})
     */
    public function show(Shot $shot): Response
    {
        return $this->render('shot/show.html.twig', [
            'shot' => $shot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="shot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Shot $shot): Response
    {
        $form = $this->createForm(ShotType::class, $shot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('shot_index');
        }

        return $this->render('shot/edit.html.twig', [
            'shot' => $shot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="shot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Shot $shot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$shot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($shot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('shot_index');
    }
}
