<?php

namespace HETIC\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LandingController extends Controller
{
    public function indexAction()
    {
        return $this->render('HETICAppBundle:Landing:index.html.twig');
    }
}
