<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\Villa;
use Application\ApplicationHomeBundle\Form\VillaType;
use Application\ApplicationHomeBundle\Entity\Image;

/**
 * Villa controller.
 *
 */
class VillaController extends Controller
{

    /**
     * Lists all Villa entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
        $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();
        $entities = $em->getRepository('ApplicationHomeBundle:Villa')->findAll();
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(1);
        for ($i = 0; $i < count($entities); $i++) {
            $k = 0;
            foreach ($im as $photo) {
                if ($entities[$i]->getId() == $photo->getObj()) {
                    $entities[$i]->images[$k] = $photo->path;
                    $k++;
                }
            }
        }


        return $this->render('ApplicationHomeBundle:Villa:index.html.twig', array(
            'entities' => $entities,
            'region'=> $lieu,
            'annonce' =>$annonce,
            'x' => 1

        ));
    }

    /**
     * Creates a new Villa entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Villa();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setDossier(1);
           // coordonné map
            $str1=str_replace('(','',$this->getRequest()->get('coord'));
            $str2=str_replace(')','',$str1);
            $tab = split(',',$str2);
            $entity->latitude=$tab[0];
            $entity->longitude=$tab[1];

            //fin coordonne
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload', array('obj' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:Villa:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Villa entity.
     *
     * @param Villa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Villa $entity)
    {
        $form = $this->createForm(new VillaType(), $entity, array(
            'action' => $this->generateUrl('villa_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Villa entity.
     *
     */
    public function newAction()
    {
        $entity = new Villa();
        $form = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:Villa:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Villa entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Villa')->find($id);
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(1);


        $k = 0;
        foreach ($im as $photo) {
            if ($entity->getId() == $photo->getObj()) {
                $entity->images[$k] = $photo;
                $k++;
            }
        }


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Villa:show.html.twig', array(
            'entity' => $entity,
            // 'i'=> 0,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Villa entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Villa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villa entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Villa:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Villa entity.
     *
     * @param Villa $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Villa $entity)
    {
        $form = $this->createForm(new VillaType(), $entity, array(
            'action' => $this->generateUrl('villa_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Villa entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Villa')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Villa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('villa_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:Villa:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Villa entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:Villa')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Villa entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('villa'));
    }

    /**
     * Creates a form to delete a Villa entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('villa_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
