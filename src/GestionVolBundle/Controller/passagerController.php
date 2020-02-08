<?php

namespace GestionVolBundle\Controller;

use GestionVolBundle\Entity\passager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Passager controller.
 *
 */
class passagerController extends Controller
{
    /**
     * Lists all passager entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $passagers = $em->getRepository('GestionVolBundle:passager')->findAll();

        return $this->render('passager/index.html.twig', array(
            'passagers' => $passagers,
        ));
    }

    /**
     * Finds and displays a passager entity.
     *
     */
    public function showAction(passager $passager)
    {

        return $this->render('passager/show.html.twig', array(
            'passager' => $passager,
        ));
    }
}
