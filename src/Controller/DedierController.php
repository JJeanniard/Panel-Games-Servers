<?php

namespace App\Controller;

use App\Entity\Dedier;
use App\Form\DedierType;
use App\Repository\DedierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//TODO Affichage des information du serveur dedier connection, cpu, hdd.....
//TODO Liste IP

/**
 * @Route("/box")
 */
class DedierController extends AbstractController
{
    /**
     * @Route("/", name="dedier_index", methods={"GET"})
     * @param DedierRepository $dedierRepository
     * @return Response
     */
    public function index(DedierRepository $dedierRepository): Response
    {
        //TODO Penser à mettre un message d'alert dans la partie serveur games, si il n'y a pas de dedier ou association avec Nitrado .....

        return $this->render('dedier/box.html.twig', [
            'dediers' => $dedierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dedier_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
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
     * @Route("/{id}", name="dedier_show", methods={"GET"})
     */
    public function show(Dedier $dedier): Response
    {
        return $this->render('dedier/show.html.twig', [
            'dedier' => $dedier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dedier_edit", methods={"GET","POST"})
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
     * @Route("/{id}", name="dedier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dedier $dedier): Response
    {
        if ($this->isCsrfTokenValid('delete' . $dedier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dedier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dedier_index');
    }
}
