<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\TypeBien;
use Application\ApplicationHomeBundle\Form\TypeBienType;

/**
 * TypeBien controller.
 *
 */
class TypeBienController extends Controller
{

    /**
     * Lists all TypeBien entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:TypeBien')->findAll();

        return $this->render('ApplicationHomeBundle:TypeBien:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TypeBien entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TypeBien();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typebien_show', array('id' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:TypeBien:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TypeBien entity.
     *
     * @param TypeBien $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TypeBien $entity)
    {
        $form = $this->createForm(new TypeBienType(), $entity, array(
            'action' => $this->generateUrl('typebien_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypeBien entity.
     *
     */
    public function newAction()
    {
        $entity = new TypeBien();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:TypeBien:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeBien entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeBien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeBien entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TypeBien:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeBien entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeBien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeBien entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TypeBien:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TypeBien entity.
    *
    * @param TypeBien $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeBien $entity)
    {
        $form = $this->createForm(new TypeBienType(), $entity, array(
            'action' => $this->generateUrl('typebien_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypeBien entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeBien')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeBien entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typebien_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:TypeBien:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TypeBien entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:TypeBien')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeBien entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typebien'));
    }

    /**
     * Creates a form to delete a TypeBien entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typebien_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
