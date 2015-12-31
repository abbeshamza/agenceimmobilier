<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 14/03/2015
 * Time: 21:55
 */

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);




        return $this->render('ApplicationHomeBundle:Admin:index.html.twig',array(
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }

}