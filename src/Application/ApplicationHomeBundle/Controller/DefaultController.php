<?php

namespace Application\ApplicationHomeBundle\Controller;

use Application\ApplicationHomeBundle\Entity\DemandeVisite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Application\ApplicationHomeBundle\Entity\Email;
use Application\ApplicationHomeBundle\Controller\EmailController;
use Application\ApplicationHomeBundle\Form\EmailType;


class DefaultController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $slide =$em->getRepository('ApplicationHomeBundle:Slide')->findAll();
        return $this->render('ApplicationHomeBundle:Default:index.html.twig',array(
            'entity' => $slide ,
        ));

    }
    public  function  email()
    {
        $email = new Email();

        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $email->setMail($this->getRequest()->get('mail'));
            $em = $this->getDoctrine()->getManager();
            $data =$em->getRepository('ApplicationHomeBundle:Email')->findOneByMail($email->getMail());
            if(count($data)<1)
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($email);
                $em->flush();


            }


        }
        return $this->redirect($this->generateUrl('application_home_homepage'));
    }
    public function demandeVisiteAction()
    {
        $visite = new DemandeVisite();
        $request = $this->get('request');
        if( $request->getMethod() == 'POST' )
        {
            $em = $this->getDoctrine()->getManager();
            $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
            $visite->setNom($this->getRequest()->get('nom'));
            $visite->setEmail($this->getRequest()->get('email'));
            $visite->setTel($this->getRequest()->get('tel'));
            $visite->setHoraire($this->getRequest()->get('choix'));
            $visite->setTexte($this->getRequest()->get('text'));
            $visite->setAnnonce($this->getRequest()->get('annonce'));
            $visite->setStatut($statut);
            $em = $this->getDoctrine()->getManager();
            $em->persist($visite);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('application_home_homepage'));

    }
    public function deposerAction()
    {
        return $this->render('ApplicationHomeBundle:Default:deposer.html.twig');
    }
    public function contactAction()
    {
        return $this->render('ApplicationHomeBundle:Default:contact.html.twig');
    }

    public function uploadAction(Request $request)
    {
        $document = new Document();
        $form = $this->createFormBuilder($document)
            ->add('name')
            ->add('file','file')
            ->add('save', 'button', array(
                'attr' => array('class' => 'save','type'=>'submit'),
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($document);
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }
        return $this->render('ApplicationHomeBundle:Default:upload.html.twig', array('form' => $form->createView()));
       // return array('form' => $form->createView());
    }
    public function traitementUploaddAction(Request $request)
    {
        if($request->getMethod()==='POST')
        {
            echo('hello from php');

        }
        else
            return $this->render('ApplicationHomeBundle:Default:upload.html.twig');

    }


}
