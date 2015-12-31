<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\Contacter;
use Application\ApplicationHomeBundle\Form\ContacterType;

/**
 * Contacter controller.
 *
 */
class ContacterController extends Controller
{

    /**
     * Lists all Contacter entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:Contacter')->findAll();
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);



        return $this->render('ApplicationHomeBundle:Contacter:index.html.twig', array(
            'entities' => $entities,
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }
    /**
     * Creates a new Contacter entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Contacter();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
            $entity->setStatut($statut);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('application_home_homepage'));
        }

        return $this->render('ApplicationHomeBundle:Contacter:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Contacter entity.
     *
     * @param Contacter $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Contacter $entity)
    {
        $form = $this->createForm(new ContacterType(), $entity, array(
            'action' => $this->generateUrl('contacter_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Envoyer'));

        return $form;
    }

    /**
     * Displays a form to create a new Contacter entity.
     *
     */
    public function newAction()
    {
        $entity = new Contacter();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:Contacter:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contacter entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Contacter')->find($id);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Contacter:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }

    /**
     * Displays a form to edit an existing Contacter entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Contacter')->find($id);
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacter entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Contacter:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }

    /**
    * Creates a form to edit a Contacter entity.
    *
    * @param Contacter $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Contacter $entity)
    {
        $form = $this->createForm(new ContacterType(), $entity, array(
            'action' => $this->generateUrl('contacter_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Marquer comme Vu'));

        return $form;
    }
    /**
     * Edits an existing Contacter entity.
     *
     */
    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(1);

        $entity = $em->getRepository('ApplicationHomeBundle:Contacter')->find($id);
        $entity->setStatut($statut);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contacter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contacter_show', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:Contacter:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Contacter entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:Contacter')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contacter entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contacter'));
    }

    /**
     * Creates a form to delete a Contacter entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contacter_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
