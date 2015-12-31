<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\TCommercialEtIndus;
use Application\ApplicationHomeBundle\Form\TCommercialEtIndusType;

/**
 * TCommercialEtIndus controller.
 *
 */
class TCommercialEtIndusController extends Controller
{

    /**
     * Lists all TCommercialEtIndus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
        $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();
        $entities = $em->getRepository('ApplicationHomeBundle:TCommercialEtIndus')->findAll();
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(7);
        for ($i = 0; $i < count($entities); $i++) {
            $k = 0;
            foreach ($im as $photo) {
                if ($entities[$i]->getId() == $photo->getObj()) {
                    $entities[$i]->images[$k] = $photo->path;
                    $k++;
                }
            }
        }

        return $this->render('ApplicationHomeBundle:TCommercialEtIndus:index.html.twig', array(
            'entities' => $entities,
            'region' => $lieu,
            'annonce' =>$annonce
        ));
    }
    /**
     * Creates a new TCommercialEtIndus entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TCommercialEtIndus();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setDossier(7);
            $str1=str_replace('(','',$this->getRequest()->get('coord'));
            $str2=str_replace(')','',$str1);
            $tab = split(',',$str2);
            $entity->latitude=$tab[0];
            $entity->longitude=$tab[1];
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload', array('obj' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:TCommercialEtIndus:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a TCommercialEtIndus entity.
     *
     * @param TCommercialEtIndus $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TCommercialEtIndus $entity)
    {
        $form = $this->createForm(new TCommercialEtIndusType(), $entity, array(
            'action' => $this->generateUrl('tcommercialetindus_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TCommercialEtIndus entity.
     *
     */
    public function newAction()
    {
        $entity = new TCommercialEtIndus();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:TCommercialEtIndus:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TCommercialEtIndus entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TCommercialEtIndus')->find($id);
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(7);


        $k = 0;
        foreach ($im as $photo) {
            if ($entity->getId() == $photo->getObj()) {
                $entity->images[$k] = $photo;
                $k++;
            }
        }


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TCommercialEtIndus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TCommercialEtIndus:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TCommercialEtIndus entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TCommercialEtIndus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TCommercialEtIndus entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:TCommercialEtIndus:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TCommercialEtIndus entity.
    *
    * @param TCommercialEtIndus $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TCommercialEtIndus $entity)
    {
        $form = $this->createForm(new TCommercialEtIndusType(), $entity, array(
            'action' => $this->generateUrl('tcommercialetindus_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TCommercialEtIndus entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:TCommercialEtIndus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TCommercialEtIndus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tcommercialetindus_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:TCommercialEtIndus:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TCommercialEtIndus entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:TCommercialEtIndus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TCommercialEtIndus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tcommercialetindus'));
    }

    /**
     * Creates a form to delete a TCommercialEtIndus entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tcommercialetindus_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
