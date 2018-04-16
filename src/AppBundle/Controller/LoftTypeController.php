<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LoftType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lofttype controller.
 *
 * @Route("isoadmin/lofttype")
 */
class LoftTypeController extends Controller
{
    /**
     * Lists all loftType entities.
     *
     * @Route("/", name="loftTypeIndex")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $loftTypes = $em->getRepository('AppBundle:LoftType')->findAll();

        return $this->render('loftType/index.html.twig', array(
            'loftTypes' => $loftTypes,
        ));
    }

    /**
     * Creates a new loftType entity.
     *
     * @Route("/new", name="loftTypeNew")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $loftType = new Lofttype();
        $form = $this->createForm('AppBundle\Form\LoftTypeType', $loftType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($loftType);
            $em->flush();

            return $this->redirectToRoute('loftTypeShow', array('id' => $loftType->getId()));
        }

        return $this->render('loftType/new.html.twig', array(
            'loftType' => $loftType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a loftType entity.
     *
     * @Route("/{id}", name="loftTypeShow")
     * @Method("GET")
     */
    public function showAction(LoftType $loftType)
    {
        $deleteForm = $this->createDeleteForm($loftType);

        return $this->render('loftType/show.html.twig', array(
            'loftType' => $loftType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing loftType entity.
     *
     * @Route("/{id}/edit", name="loftTypeEdit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LoftType $loftType)
    {
        $deleteForm = $this->createDeleteForm($loftType);
        $editForm = $this->createForm('AppBundle\Form\LoftTypeType', $loftType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('loftTypeEdit', array('id' => $loftType->getId()));
        }

        return $this->render('loftType/edit.html.twig', array(
            'loftType' => $loftType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a loftType entity.
     *
     * @Route("/{id}", name="loftTypeDelete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LoftType $loftType)
    {
        $form = $this->createDeleteForm($loftType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($loftType);
            $em->flush();
        }

        return $this->redirectToRoute('loftTypeIndex');
    }

    /**
     * Creates a form to delete a loftType entity.
     *
     * @param LoftType $loftType The loftType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LoftType $loftType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('loftTypeDelete', array('id' => $loftType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
