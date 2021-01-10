<?php

namespace App\Controller;

use App\Entity\Hole;
use App\Form\HoleType;
use App\Repository\HoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hole")
 */
class HoleController extends AbstractController
{
    /**
     * @Route("/", name="hole_index", methods={"GET"})
     */
    public function index(HoleRepository $holeRepository): Response
    {
        return $this->render('hole/index.html.twig', [
            'holes' => $holeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hole_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hole = new Hole();
        $form = $this->createForm(HoleType::class, $hole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hole);
            $entityManager->flush();

            return $this->redirectToRoute('hole_index');
        }

        return $this->render('hole/new.html.twig', [
            'hole' => $hole,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hole_show", methods={"GET"})
     */
    public function show(Hole $hole): Response
    {
        return $this->render('hole/show.html.twig', [
            'hole' => $hole,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hole_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Hole $hole): Response
    {
        $form = $this->createForm(HoleType::class, $hole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hole_index');
        }

        return $this->render('hole/edit.html.twig', [
            'hole' => $hole,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hole_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Hole $hole): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hole->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hole);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hole_index');
    }
}
