<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\Slide;
use Application\ApplicationHomeBundle\Form\SlideType;

/**
 * Slide controller.
 *
 */
class SlideController extends Controller
{

    public function uploadAction()
    {
        $image = new Slide();
        $form = $this->createFormBuilder($image)
            ->add('name','text')
            ->add('description','text')
            ->add('file','file')
            ->getForm()
        ;
        $test=0;
        if ($this->getRequest()->isMethod('POST')) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $image->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($image);
                $em->flush();
                $test=1;
            }
        }
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);
        return $this->render('ApplicationHomeBundle:Slide:new.html.twig', array(
            'image' => $image,
            'form' => $form->createView() ,
            'test'=>$test,
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }
}
