<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\TypeAnnonce;
use Application\ApplicationHomeBundle\Form\TypeAnnonceType;

/**
 * TypeAnnonce controller.
 *
 */
class TypeAnnonceController extends Controller
{

    /**
     * Lists all TypeAnnonce entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();

        return $this->render('ApplicationHomeBundle:TypeAnnonce:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TypeAnnonce entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TypeAnnonce();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeannonce_show', array('id' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:TypeAnnonce:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TypeAnnonce entity.
     *
     * @param TypeAnnonce $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TypeAnnonce $entity)
    {
        $form = $this->createForm(new TypeAnnonceType(), $entity, array(
            'action' => $this->generateUrl('typeannonce_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypeAnnonce entity.
     *
     */
    public function newAction()
    {
        $entity = new TypeAnnonce();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:TypeAnnonce:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeAnnonce entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonce')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAnnonce entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TypeAnnonce:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeAnnonce entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonce')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAnnonce entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TypeAnnonce:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TypeAnnonce entity.
    *
    * @param TypeAnnonce $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeAnnonce $entity)
    {
        $form = $this->createForm(new TypeAnnonceType(), $entity, array(
            'action' => $this->generateUrl('typeannonce_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypeAnnonce entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonce')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAnnonce entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeannonce_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:TypeAnnonce:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TypeAnnonce entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonce')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeAnnonce entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typeannonce'));
    }

    /**
     * Creates a form to delete a TypeAnnonce entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeannonce_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
