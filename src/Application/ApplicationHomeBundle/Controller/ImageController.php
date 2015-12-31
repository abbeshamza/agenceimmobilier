<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 01/03/2015
 * Time: 18:46
 */

namespace Application\ApplicationHomeBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Application\ApplicationHomeBundle\Entity\Image;


class ImageController  extends Controller{

    public function uploadAction($obj)
    {
        $image = new image();
        $image->setObj($obj);
        $form = $this->createFormBuilder($image)
            ->add('name')
            ->add('description')
            ->add('file','file')
            ->add('typeAnnonceClient')
            ->getForm()
        ;
$test=0;

        if ($this->getRequest()->isMethod('POST')) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $image->obj=$obj;
                $image->upload();
                $em = $this->getDoctrine()->getManager();
                $em->persist($image);
                $em->flush();
                $test=1;



            }
        }

        return $this->render('ApplicationHomeBundle:Image:new.html.twig', array(
            'image' => $image,
            'form' => $form->createView() ,
            'obj' =>$obj,
            'test'=>$test,
        ));
    }
}