<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ResourceLimit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Resourcelimit controller.
 *
 * @Route("isoadmin/resource-limit")
 */
class ResourceLimitController extends Controller
{
    /**
     * Lists all resourceLimit entities.
     *
     * @Route("s", name="resourceLimitIndex")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resourceLimits = $em->getRepository('AppBundle:ResourceLimit')->findAll();

        return $this->render('resourceLimit/index.html.twig', array(
            'resourceLimits' => $resourceLimits,
        ));
    }

    /**
     * Creates a new resourceLimit entity.
     *
     * @Route("/new", name="resourceLimitNew")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resourceLimit = new Resourcelimit();
        $form = $this->createForm('AppBundle\Form\ResourceLimitType', $resourceLimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resourceLimit);
            $em->flush();

            return $this->redirectToRoute('resourceLimitIndex', array('id' => $resourceLimit->getId()));
        }

        return $this->render('resourceLimit/new.html.twig', array(
            'resourceLimit' => $resourceLimit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resourceLimit entity.
     *
     * @Route("/{id}", name="resourceLimitShow")
     * @Method("GET")
     */
    public function showAction(ResourceLimit $resourceLimit)
    {
        $deleteForm = $this->createDeleteForm($resourceLimit);

        return $this->render('resourceLimit/show.html.twig', array(
            'resourceLimit' => $resourceLimit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resourceLimit entity.
     *
     * @Route("/{id}/edit", name="resourceLimitEdit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResourceLimit $resourceLimit)
    {
        $deleteForm = $this->createDeleteForm($resourceLimit);
        $editForm = $this->createForm('AppBundle\Form\ResourceLimitType', $resourceLimit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resourceLimitEdit', array('id' => $resourceLimit->getId()));
        }

        return $this->render('resourceLimit/edit.html.twig', array(
            'resourceLimit' => $resourceLimit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resourceLimit entity.
     *
     * @Route("/{id}", name="resourceLimitDelete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ResourceLimit $resourceLimit)
    {
        $form = $this->createDeleteForm($resourceLimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resourceLimit);
            $em->flush();
        }

        return $this->redirectToRoute('resourceLimitIndex');
    }

    /**
     * Creates a form to delete a resourceLimit entity.
     *
     * @param ResourceLimit $resourceLimit The resourceLimit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResourceLimit $resourceLimit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resourceLimitDelete', array('id' => $resourceLimit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
