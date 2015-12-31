<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\THabitation;
use Application\ApplicationHomeBundle\Form\THabitationType;

/**
 * THabitation controller.
 *
 */
class THabitationController extends Controller
{

    /**
     * Lists all THabitation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
        $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();
        $entities = $em->getRepository('ApplicationHomeBundle:THabitation')->findAll();
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(6);
        for ($i = 0; $i < count($entities); $i++) {
            $k = 0;
            foreach ($im as $photo) {
                if ($entities[$i]->getId() == $photo->getObj()) {
                    $entities[$i]->images[$k] = $photo->path;
                    $k++;
                }
            }
        }

        return $this->render('ApplicationHomeBundle:THabitation:index.html.twig', array(
            'entities' => $entities,
            'region'=> $lieu,
            'annonce'=> $annonce
        ));
    }
    /**
     * Creates a new THabitation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new THabitation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setDossier(6);
            $str1=str_replace('(','',$this->getRequest()->get('coord'));
            $str2=str_replace(')','',$str1);
            $tab = split(',',$str2);
            $entity->latitude=$tab[0];
            $entity->longitude=$tab[1];
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload', array('obj' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:THabitation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a THabitation entity.
     *
     * @param THabitation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(THabitation $entity)
    {
        $form = $this->createForm(new THabitationType(), $entity, array(
            'action' => $this->generateUrl('thabitation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new THabitation entity.
     *
     */
    public function newAction()
    {
        $entity = new THabitation();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:THabitation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a THabitation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:THabitation')->find($id);
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(6);


        $k = 0;
        foreach ($im as $photo) {
            if ($entity->getId() == $photo->getObj()) {
                $entity->images[$k] = $photo;
                $k++;
            }
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find THabitation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:THabitation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing THabitation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:THabitation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find THabitation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:THabitation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a THabitation entity.
    *
    * @param THabitation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(THabitation $entity)
    {
        $form = $this->createForm(new THabitationType(), $entity, array(
            'action' => $this->generateUrl('thabitation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing THabitation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:THabitation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find THabitation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('thabitation_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:THabitation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a THabitation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:THabitation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find THabitation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('thabitation'));
    }

    /**
     * Creates a form to delete a THabitation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('thabitation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
