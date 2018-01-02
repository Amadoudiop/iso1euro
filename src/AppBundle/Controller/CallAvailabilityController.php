<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CallAvailability;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Callavailability controller.
 *
 * @Route("isoadmin/call-availabilit")
 */
class CallAvailabilityController extends Controller
{
    /**
     * Lists all callAvailability entities.
     *
     * @Route("ies", name="callAvailabilityIndex")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $callAvailabilities = $em->getRepository('AppBundle:CallAvailability')->findAll();

        return $this->render('callAvailability/index.html.twig', array(
            'callAvailabilities' => $callAvailabilities,
        ));
    }

    /**
     * Creates a new callAvailability entity.
     *
     * @Route("y/new", name="callAvailabilityNew")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $callAvailability = new Callavailability();
        $form = $this->createForm('AppBundle\Form\CallAvailabilityType', $callAvailability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($callAvailability);
            $em->flush();

            return $this->redirectToRoute('callAvailabilityIndex', array('id' => $callAvailability->getId()));
        }

        return $this->render('callAvailability/new.html.twig', array(
            'callAvailability' => $callAvailability,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a callAvailability entity.
     *
     * @Route("y/{id}", name="callAvailabilityShow")
     * @Method("GET")
     */
    public function showAction(CallAvailability $callAvailability)
    {
        $deleteForm = $this->createDeleteForm($callAvailability);

        return $this->render('callAvailability/show.html.twig', array(
            'callAvailability' => $callAvailability,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing callAvailability entity.
     *
     * @Route("y/{id}/edit", name="callAvailabilityEdit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CallAvailability $callAvailability)
    {
        $deleteForm = $this->createDeleteForm($callAvailability);
        $editForm = $this->createForm('AppBundle\Form\CallAvailabilityType', $callAvailability);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('callAvailabilityEdit', array('id' => $callAvailability->getId()));
        }

        return $this->render('callAvailability/edit.html.twig', array(
            'callAvailability' => $callAvailability,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a callAvailability entity.
     *
     * @Route("y/{id}", name="callAvailabilityDelete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CallAvailability $callAvailability)
    {
        $form = $this->createDeleteForm($callAvailability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($callAvailability);
            $em->flush();
        }

        return $this->redirectToRoute('callAvailabilityIndex');
    }

    /**
     * Creates a form to delete a callAvailability entity.
     *
     * @param CallAvailability $callAvailability The callAvailability entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CallAvailability $callAvailability)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('callAvailabilityDelete', array('id' => $callAvailability->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
