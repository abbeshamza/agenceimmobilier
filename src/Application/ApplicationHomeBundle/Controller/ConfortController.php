<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\Confort;
use Application\ApplicationHomeBundle\Form\ConfortType;

/**
 * Confort controller.
 *
 */
class ConfortController extends Controller
{

    /**
     * Lists all Confort entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:Confort')->findAll();

        return $this->render('ApplicationHomeBundle:Confort:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Confort entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Confort();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('confort_show', array('id' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:Confort:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Confort entity.
     *
     * @param Confort $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Confort $entity)
    {
        $form = $this->createForm(new ConfortType(), $entity, array(
            'action' => $this->generateUrl('confort_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Confort entity.
     *
     */
    public function newAction()
    {
        $entity = new Confort();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:Confort:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Confort entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Confort')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Confort entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Confort:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Confort entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Confort')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Confort entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Confort:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Confort entity.
    *
    * @param Confort $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Confort $entity)
    {
        $form = $this->createForm(new ConfortType(), $entity, array(
            'action' => $this->generateUrl('confort_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Confort entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Confort')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Confort entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('confort_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:Confort:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Confort entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:Confort')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Confort entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('confort'));
    }

    /**
     * Creates a form to delete a Confort entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('confort_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
