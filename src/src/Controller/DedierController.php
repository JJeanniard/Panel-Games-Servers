<?php

namespace App\Controller;

use App\Entity\Dedier;
use App\Form\DedierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dedier")
 */
class DedierController extends AbstractController
{
    /**
     * @Route("/", name="dedier_index", methods={"GET"})
     */
    public function index(): Response
    {
        $dediers = $this->getDoctrine()
            ->getRepository(Dedier::class)
            ->findAll();

        return $this->render('dedier/index.html.twig', [
            'dediers' => $dediers,
        ]);
    }

    /**
     * @Route("/new", name="dedier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dedier = new Dedier();
        $form = $this->createForm(DedierType::class, $dedier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dedier);
            $entityManager->flush();

            return $this->redirectToRoute('dedier_index');
        }

        return $this->render('dedier/new.html.twig', [
            'dedier' => $dedier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{name}", name="dedier_show", methods={"GET"})
     */
    public function show(Dedier $dedier): Response
    {
        return $this->render('dedier/show.html.twig', [
            'dedier' => $dedier,
        ]);
    }

    /**
     * @Route("/{name}/edit", name="dedier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dedier $dedier): Response
    {
        $form = $this->createForm(DedierType::class, $dedier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dedier_index');
        }

        return $this->render('dedier/edit.html.twig', [
            'dedier' => $dedier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{name}", name="dedier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dedier $dedier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dedier->getName(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dedier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dedier_index');
    }
}
