<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\NbrPiece;
use Application\ApplicationHomeBundle\Form\NbrPieceType;

/**
 * NbrPiece controller.
 *
 */
class NbrPieceController extends Controller
{

    /**
     * Lists all NbrPiece entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:NbrPiece')->findAll();

        return $this->render('ApplicationHomeBundle:NbrPiece:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new NbrPiece entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new NbrPiece();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nbrpiece_show', array('id' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:NbrPiece:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a NbrPiece entity.
     *
     * @param NbrPiece $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NbrPiece $entity)
    {
        $form = $this->createForm(new NbrPieceType(), $entity, array(
            'action' => $this->generateUrl('nbrpiece_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NbrPiece entity.
     *
     */
    public function newAction()
    {
        $entity = new NbrPiece();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:NbrPiece:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NbrPiece entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:NbrPiece')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NbrPiece entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:NbrPiece:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NbrPiece entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:NbrPiece')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NbrPiece entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:NbrPiece:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a NbrPiece entity.
    *
    * @param NbrPiece $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NbrPiece $entity)
    {
        $form = $this->createForm(new NbrPieceType(), $entity, array(
            'action' => $this->generateUrl('nbrpiece_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NbrPiece entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:NbrPiece')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NbrPiece entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nbrpiece_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:NbrPiece:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a NbrPiece entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:NbrPiece')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NbrPiece entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nbrpiece'));
    }

    /**
     * Creates a form to delete a NbrPiece entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nbrpiece_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
