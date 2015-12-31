<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\TypeAnnonceClient;
use Application\ApplicationHomeBundle\Form\TypeAnnonceClientType;

/**
 * TypeAnnonceClient controller.
 *
 */
class TypeAnnonceClientController extends Controller
{

    /**
     * Lists all TypeAnnonceClient entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApplicationHomeBundle:TypeAnnonceClient')->findAll();

        return $this->render('ApplicationHomeBundle:TypeAnnonceClient:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TypeAnnonceClient entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TypeAnnonceClient();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typeannonceclient_show', array('id' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:TypeAnnonceClient:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TypeAnnonceClient entity.
     *
     * @param TypeAnnonceClient $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TypeAnnonceClient $entity)
    {
        $form = $this->createForm(new TypeAnnonceClientType(), $entity, array(
            'action' => $this->generateUrl('typeannonceclient_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TypeAnnonceClient entity.
     *
     */
    public function newAction()
    {
        $entity = new TypeAnnonceClient();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:TypeAnnonceClient:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TypeAnnonceClient entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonceClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAnnonceClient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TypeAnnonceClient:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TypeAnnonceClient entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonceClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAnnonceClient entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TypeAnnonceClient:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TypeAnnonceClient entity.
    *
    * @param TypeAnnonceClient $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TypeAnnonceClient $entity)
    {
        $form = $this->createForm(new TypeAnnonceClientType(), $entity, array(
            'action' => $this->generateUrl('typeannonceclient_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TypeAnnonceClient entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonceClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TypeAnnonceClient entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typeannonceclient_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:TypeAnnonceClient:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TypeAnnonceClient entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:TypeAnnonceClient')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TypeAnnonceClient entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typeannonceclient'));
    }

    /**
     * Creates a form to delete a TypeAnnonceClient entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeannonceclient_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
