<?php

namespace App\Controller;

use App\Entity\DedierIP;
use App\Form\DedierIPType;
use App\Repository\DedierIPRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/box/ip")
 */
class DedierIPController extends AbstractController
{
    public function index(DedierIPRepository $dedierIPRepository): Response
    {
        return $this->render('dedier_ip/index.html.twig', [
            'dedier_i_ps' => $dedierIPRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dedier_i_p_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dedierIP = new DedierIP();
        $form = $this->createForm(DedierIPType::class, $dedierIP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dedierIP);
            $entityManager->flush();

            return $this->redirectToRoute('dedier_index');
        }

        return $this->render('dedier_ip/new.html.twig', [
            'dedier_i_p' => $dedierIP,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dedier_i_p_show", methods={"GET"})
     */
    public function show(DedierIP $dedierIP): Response
    {
        return $this->render('dedier_ip/show.html.twig', [
            'dedier_i_p' => $dedierIP,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dedier_i_p_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DedierIP $dedierIP): Response
    {
        $form = $this->createForm(DedierIPType::class, $dedierIP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dedier_index');
        }

        return $this->render('dedier_ip/edit.html.twig', [
            'dedier_i_p' => $dedierIP,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dedier_i_p_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DedierIP $dedierIP): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dedierIP->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dedierIP);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dedier_index');
    }
}
