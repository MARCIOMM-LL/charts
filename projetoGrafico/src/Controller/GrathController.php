<?php

namespace App\Controller;

use App\Entity\Grath;
use App\Form\GrathType;
use App\Repository\GrathRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/grath")
 */
class GrathController extends AbstractController
{
    /**
     * @Route("/", name="grath_index", methods={"GET"})
     */
    public function index(GrathRepository $grathRepository): Response
    {
        return $this->render('grath/index.html.twig', [
            'graths' => $grathRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="grath_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $grath = new Grath();
        $form = $this->createForm(GrathType::class, $grath);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grath);
            $entityManager->flush();

            return $this->redirectToRoute('grath_index');
        }

        return $this->render('grath/new.html.twig', [
            'grath' => $grath,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grath_show", methods={"GET"})
     */
    public function show(Grath $grath): Response
    {
        return $this->render('grath/show.html.twig', [
            'grath' => $grath,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="grath_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Grath $grath): Response
    {
        $form = $this->createForm(GrathType::class, $grath);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grath_index');
        }

        return $this->render('grath/edit.html.twig', [
            'grath' => $grath,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grath_delete", methods={"POST"})
     */
    public function delete(Request $request, Grath $grath): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grath->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($grath);
            $entityManager->flush();
        }

        return $this->redirectToRoute('grath_index');
    }
}
