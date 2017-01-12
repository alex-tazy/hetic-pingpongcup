<?php

namespace HETIC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SuperAdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('HETICCoreBundle:SuperAdmin:index.html.twig');
    }

    public function createTournament(Request $request) {
        // $tournament = new Tournament();
        // $form = $this->createForm(, $tournament);
        // $form->handleRequest($request);
        //
        // if ($form->isValid()) {
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($tournament);
        //     $em->flush();
        //
        //     return $this->redirectToRoute('hetic_core_superadmin_tournament');
        // }
        //
        // return $this->render('HETICAppBundle:SuperAdmin/Tournament:index.html.twig');
    }

    public function editTournament(Request $request, Tournament $tournament) {
        // $form = $this->createForm('HETIC\CoreBundle\Form\TournamentType', $tournament);
        // $form->handleRequest($request);
        //
        // if ($form->isValid()) {
        //     $em = $this->getDoctrine()->getManager();
        //     $em->persist($tournament);
        //     $em->flush();
        //
        //     return $this->redirectToRoute('hetic_core_superadmin_tournament');
        // }
        //
        // return $this->render('HETICAppBundle:SuperAdmin/Tournament:index.html.twig');
    }

    public function showTournaments() {
        $em = $this->getDoctrine()->getManager();
        $tournaments = $em->getRepository('HETICAppBundle:Tournament')->findAll();

        return $this->render('HETICAppBundle:SuperAdmin/Tournament:index.html.twig', array('tournaments' => $tournaments));
    }

    public function showStartup() {
        return $this->render('HETICAppBundle:Landing:index.html.twig');
    }

    public function validateStartup ($id) {
        return $this->render('HETICAppBundle:Landing:index.html.twig');
    }

    public function refuseStartup($id) {
        return $this->render('HETICAppBundle:Landing:index.html.twig');
    }
}
