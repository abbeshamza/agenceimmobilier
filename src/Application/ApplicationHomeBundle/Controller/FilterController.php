<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 25/03/2015
 * Time: 14:59
 */

namespace Application\ApplicationHomeBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class FilterController  extends Controller

{


    public function testAngularAction()
    {
        $em = $this->getDoctrine()->getManager();
        $villa=$em->getRepository('ApplicationHomeBundle:Villa')->findAll();
        $reponse = new JsonResponse($villa);
        return $reponse;

    }
    public function indexAction ()
    {
        $em = $this->getDoctrine()->getManager();
        $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
        $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();
        return $this->render('ApplicationHomeBundle:Filter:index.html.twig', array(
            'region'=> $lieu,
            'annonce' =>$annonce,));
    }
    public function delegationAction()
    {
        $request = $this->container->get('request');
        if($request->isXMLHttpRequest())
        {
            $region = $_POST['lieu'];
        }
        $reponse = new JsonResponse("hamza");
        return $this->render('::delegation.html.twig', array(
            'response'=> $reponse,
            'region' => $region
        ));

    }
    public function filterAction()
    {
        $request = $this->container->get('request');

            $text="";
            $region0 = $_POST['lieu'];
            $em = $this->getDoctrine()->getManager();
            $region=$em->getRepository('ApplicationHomeBundle:Region')->findOneByLabel($region0);
            $prix0 =$_POST['prix'];
             $prix=intval($text=str_replace(' ','',$prix0));
            $annonce0=$_POST['annonce'];
            $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findOneByLabel($annonce0);
            $table =$_POST['table'];
            $delegation = $_POST['delegation'];
        $chambres=$_POST['chambre'];
        echo $chambres;



            $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
            $annonces=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();

                   switch($table)
                   {

                       case "Villa":

                           $em = $this->getDoctrine()->getManager();
                           $query = $em->createQuery(
                               'SELECT p
                                FROM ApplicationHomeBundle:Villa p
                                WHERE p.prix < :price AND p.typeAnnonce = :annonce
                                AND p.prix = :prix AND p.delegation = :delegation
                                ORDER BY p.prix ASC'
                           )->setParameters(array(
                               'price'=> $prix,
                               'annonce'=>$annonce->getId(),
                               'delegation' => $delegation,
                               'prix' => $chambres
                           ) );

                           $entities = $query->getResult();
                           $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(1);
                           for ($i = 0; $i < count($entities); $i++) {
                               $k = 0;
                               foreach ($im as $photo) {
                                   if ($entities[$i]->getId() == $photo->getObj()) {
                                       $entities[$i]->images[$k] = $photo->path;
                                       $k++;
                                   }
                               }
                           }


                           return $this->render('ApplicationHomeBundle:Villa:index.html.twig', array(
                               'entities' => $entities,
                               'region'=> $lieu,
                               'annonce' =>$annonces,
                               'x' => 1

                           ));


                           break;

                   }






    }

}