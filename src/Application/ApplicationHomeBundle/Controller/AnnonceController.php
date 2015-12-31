<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\Annonce;
use Application\ApplicationHomeBundle\Form\AnnonceType;

/**
 * Annonce controller.
 *
 */
class AnnonceController extends Controller
{

    /**
     * Lists all Annonce entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:Annonce')->findAll();
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        return $this->render('ApplicationHomeBundle:Annonce:index.html.twig', array(
            'entities' => $entities,
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }
    /**
     * Creates a new Annonce entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Annonce();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);


        if ($form->isValid() ) {
            $entity->setStatut($statut);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('application_home_homepage'));
        }

        return $this->render('ApplicationHomeBundle:Annonce:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Annonce entity.
     *
     * @param Annonce $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Annonce $entity)
    {
        $form = $this->createForm(new AnnonceType(), $entity, array(
            'action' => $this->generateUrl('annonce_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Annonce entity.
     *
     */
    public function newAction()
    {
        $entity = new Annonce();
        //$entity->setStatut("non");
        $form   = $this->createCreateForm($entity);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        return $this->render('ApplicationHomeBundle:Annonce:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }

    /**
     * Finds and displays a Annonce entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Annonce')->find($id);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annonce entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Annonce:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }

    /**
     * Displays a form to edit an existing Annonce entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Annonce')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annonce entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        return $this->render('ApplicationHomeBundle:Annonce:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }

    /**
    * Creates a form to edit a Annonce entity.
    *
    * @param Annonce $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Annonce $entity)
    {
        $form = $this->createForm(new AnnonceType(), $entity, array(
            'action' => $this->generateUrl('annonce_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Marquer comme Vu'));

        return $form;
    }
    /**
     * Edits an existing Annonce entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Annonce')->find($id);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Annonce entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(1);
            $entity->setStatut($statut);
            $em->flush();

            return $this->redirect($this->generateUrl('annonce_show', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:Annonce:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }
    /**
     * Deletes a Annonce entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:Annonce')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Annonce entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('annonce'));
    }

    /**
     * Creates a form to delete a Annonce entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('annonce_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
