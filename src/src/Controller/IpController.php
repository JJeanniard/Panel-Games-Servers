<?php

namespace App\Controller;

use App\Entity\Ip;
use App\Form\IpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ip")
 */
class IpController extends AbstractController
{
    /**
     * @Route("/", name="ip_index", methods={"GET"})
     */
    public function index(): Response
    {
        $ips = $this->getDoctrine()
            ->getRepository(Ip::class)
            ->findAll();

        return $this->render('ip/index.html.twig', [
            'ips' => $ips,
        ]);
    }

    /**
     * @Route("/new", name="ip_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ip = new Ip();
        $form = $this->createForm(IpType::class, $ip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ip);
            $entityManager->flush();

            return $this->redirectToRoute('ip_index');
        }

        return $this->render('ip/new.html.twig', [
            'ip' => $ip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{ip}", name="ip_show", methods={"GET"})
     */
    public function show(Ip $ip): Response
    {
        return $this->render('ip/show.html.twig', [
            'ip' => $ip,
        ]);
    }

    /**
     * @Route("/{ip}/edit", name="ip_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ip $ip): Response
    {
        $form = $this->createForm(IpType::class, $ip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ip_index');
        }

        return $this->render('ip/edit.html.twig', [
            'ip' => $ip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{ip}", name="ip_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ip $ip): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ip->getIp(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ip);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ip_index');
    }
}
