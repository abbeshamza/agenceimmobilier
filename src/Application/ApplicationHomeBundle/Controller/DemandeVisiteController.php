<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\DemandeVisite;
use Application\ApplicationHomeBundle\Form\DemandeVisiteType;

/**
 * DemandeVisite controller.
 *
 */
class DemandeVisiteController extends Controller
{

    /**
     * Lists all DemandeVisite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findAll();
        $em = $this->getDoctrine()->getManager();
        $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(2);
        $message= $em->getRepository('ApplicationHomeBundle:Contacter')->findByStatut($statut);
        $annonce= $em->getRepository('ApplicationHomeBundle:Annonce')->findByStatut($statut);
        $visites = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->findByStatut($statut);

        return $this->render('ApplicationHomeBundle:DemandeVisite:index.html.twig', array(
            'entities' => $entities,
            'nbr_message' => count($message),
            'nbr_annonce' => count($annonce),
            'nbr_visite' => count($visites)
        ));
    }
    /**
     * Creates a new DemandeVisite entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DemandeVisite();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('demandevisite_show', array('id' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:DemandeVisite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a DemandeVisite entity.
     *
     * @param DemandeVisite $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DemandeVisite $entity)
    {
        $form = $this->createForm(new DemandeVisiteType(), $entity, array(
            'action' => $this->generateUrl('demandevisite_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DemandeVisite entity.
     *
     */
    public function newAction()
    {
        $entity = new DemandeVisite();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:DemandeVisite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DemandeVisite entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DemandeVisite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:DemandeVisite:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing DemandeVisite entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DemandeVisite entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:DemandeVisite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DemandeVisite entity.
    *
    * @param DemandeVisite $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DemandeVisite $entity)
    {
        $form = $this->createForm(new DemandeVisiteType(), $entity, array(
            'action' => $this->generateUrl('demandevisite_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Marquer comme vu'));

        return $form;
    }
    /**
     * Edits an existing DemandeVisite entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DemandeVisite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $statut = $em->getRepository('ApplicationHomeBundle:Statut')->findOneById(1);
            $entity->setStatut($statut);
            $em->flush();

            return $this->redirect($this->generateUrl('demandevisite_show', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:DemandeVisite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DemandeVisite entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:DemandeVisite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DemandeVisite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('demandevisite'));
    }

    /**
     * Creates a form to delete a DemandeVisite entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandevisite_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
