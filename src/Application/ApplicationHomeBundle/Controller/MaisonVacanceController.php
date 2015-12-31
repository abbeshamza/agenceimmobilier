<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\MaisonVacance;
use Application\ApplicationHomeBundle\Form\MaisonVacanceType;

/**
 * MaisonVacance controller.
 *
 */
class MaisonVacanceController extends Controller
{

    /**
     * Lists all MaisonVacance entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
        $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();
        $entities = $em->getRepository('ApplicationHomeBundle:MaisonVacance')->findAll();
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(3);
        for ($i = 0; $i < count($entities); $i++) {
            $k = 0;
            foreach ($im as $photo) {
                if ($entities[$i]->getId() == $photo->getObj()) {
                    $entities[$i]->images[$k] = $photo->path;
                   // echo $entities[$i]->images[$k].'<br>';
                    $k++;
                }
            }
        }

        return $this->render('ApplicationHomeBundle:MaisonVacance:index.html.twig', array(
            'entities' => $entities,
            'region'=>$lieu,
            'annonce'=> $annonce
        ));
    }
    /**
     * Creates a new MaisonVacance entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MaisonVacance();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setDossier(3);
            $str1=str_replace('(','',$this->getRequest()->get('coord'));
            $str2=str_replace(')','',$str1);
            $tab = split(',',$str2);
            $entity->latitude=$tab[0];
            $entity->longitude=$tab[1];
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload', array('obj' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:MaisonVacance:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a MaisonVacance entity.
     *
     * @param MaisonVacance $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MaisonVacance $entity)
    {
        $form = $this->createForm(new MaisonVacanceType(), $entity, array(
            'action' => $this->generateUrl('maisonvacance_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MaisonVacance entity.
     *
     */
    public function newAction()
    {
        $entity = new MaisonVacance();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:MaisonVacance:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MaisonVacance entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:MaisonVacance')->find($id);
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(3);


        $k = 0;
        foreach ($im as $photo) {
            if ($entity->getId() == $photo->getObj()) {
                $entity->images[$k] = $photo;
                $k++;
            }
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaisonVacance entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:MaisonVacance:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MaisonVacance entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:MaisonVacance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaisonVacance entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:MaisonVacance:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MaisonVacance entity.
    *
    * @param MaisonVacance $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MaisonVacance $entity)
    {
        $form = $this->createForm(new MaisonVacanceType(), $entity, array(
            'action' => $this->generateUrl('maisonvacance_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MaisonVacance entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:MaisonVacance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MaisonVacance entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('maisonvacance_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:MaisonVacance:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a MaisonVacance entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:MaisonVacance')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MaisonVacance entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('maisonvacance'));
    }

    /**
     * Creates a form to delete a MaisonVacance entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maisonvacance_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
