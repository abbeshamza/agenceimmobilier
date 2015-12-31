<?php

namespace Application\ApplicationHomeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Application\ApplicationHomeBundle\Entity\Appartement;
use Application\ApplicationHomeBundle\Form\AppartementType;

/**
 * Appartement controller.
 *
 */
class AppartementController extends Controller
{

    /**
     * Lists all Appartement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lieu=$em->getRepository('ApplicationHomeBundle:Region')->findAll();
        $annonce=$em->getRepository('ApplicationHomeBundle:TypeAnnonce')->findAll();
        $entities = $em->getRepository('ApplicationHomeBundle:Appartement')->findAll();
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(2);
        for ($i = 0; $i < count($entities); $i++) {
            $k = 0;
            foreach ($im as $photo) {
                if ($entities[$i]->getId() == $photo->getObj()) {
                    $entities[$i]->images[$k] = $photo->path;
                    $k++;
                }
            }
        }

        return $this->render('ApplicationHomeBundle:Appartement:index.html.twig', array(
            'entities' => $entities,
            'region' =>$lieu,
            'annonce'=> $annonce
        ));
    }
    /**
     * Creates a new Appartement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Appartement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setDossier(2);
            $str1=str_replace('(','',$this->getRequest()->get('coord'));
            $str2=str_replace(')','',$str1);
            $tab = split(',',$str2);
            $entity->latitude=$tab[0];
            $entity->longitude=$tab[1];
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('upload', array('obj' => $entity->getId())));
        }

        return $this->render('ApplicationHomeBundle:Appartement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Appartement entity.
     *
     * @param Appartement $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Appartement $entity)
    {
        $form = $this->createForm(new AppartementType(), $entity, array(
            'action' => $this->generateUrl('appartement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Appartement entity.
     *
     */
    public function newAction()
    {
        $entity = new Appartement();
        $form   = $this->createCreateForm($entity);

        return $this->render('ApplicationHomeBundle:Appartement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Appartement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Appartement')->find($id);
        $im = $em->getRepository('ApplicationHomeBundle:Image')->findByTypeAnnonceClient(2);


        $k = 0;
        foreach ($im as $photo) {
            if ($entity->getId() == $photo->getObj()) {
                $entity->images[$k] = $photo;
                $k++;
            }
        }


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Appartement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Appartement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Appartement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ApplicationHomeBundle:Appartement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Appartement entity.
    *
    * @param Appartement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Appartement $entity)
    {
        $form = $this->createForm(new AppartementType(), $entity, array(
            'action' => $this->generateUrl('appartement_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Appartement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApplicationHomeBundle:Appartement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Appartement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('appartement_edit', array('id' => $id)));
        }

        return $this->render('ApplicationHomeBundle:Appartement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Appartement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApplicationHomeBundle:Appartement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Appartement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('appartement'));
    }

    /**
     * Creates a form to delete a Appartement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appartement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
