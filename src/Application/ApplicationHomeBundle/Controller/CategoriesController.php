<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 21/02/2015
 * Time: 23:38
 */

namespace Application\ApplicationHomeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller {
    public function villaAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:villa.html.twig', array('name' => 'hama'));
    }
    public function appartementAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:appartement.html.twig', array('name' => 'hama'));
    }
    public function maisonvaccAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:maisonvacc.html.twig', array('name' => 'hama'));
    }
    public function bureauAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:bureau.html.twig', array('name' => 'hama'));
    }
    public function locauxcommAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:locauxcomm.html.twig', array('name' => 'hama'));
    }
    public function terrainhabiAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:terrainhabit.html.twig', array('name' => 'hama'));
    }
    public function terraincommAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:terraincomm.html.twig', array('name' => 'hama'));
    }
    public function terrainagricAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:terrainagric.html.twig', array('name' => 'hama'));
    }
    public function autreAction()
    {
        return $this->render('ApplicationHomeBundle:Categories:autre.html.twig', array('name' => 'hama'));
    }

}