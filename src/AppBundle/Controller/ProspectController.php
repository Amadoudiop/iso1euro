<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prospect;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Prospect controller.
 *
 * @Route("admin/prospect")
 */
class ProspectController extends Controller
{
    /**
     * Lists all prospect entities.
     *
     * @Route("/", name="prospect_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $prospects = $em->getRepository('AppBundle:Oeuvre')->findAll();

        return $this->render('prospect/index.html.twig', array(
            'prospects' => $prospects,
        ));
    }

    /**
     * Creates a new prospect entity.
     *
     * @Route("/new", name="prospect_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $prospect = new Prospect();
        $form = $this->createForm('AppBundle\Form\ProspectType', $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prospect);
            $em->flush();

            return $this->redirectToRoute('homepage', array('id' => $prospect->getId()));
        }

        return $this->render('prospect/new.html.twig', array(
            'prospect' => $prospect,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a prospect entity.
     *
     * @Route("/{id}", name="prospect_show")
     * @Method("GET")
     */
    public function showAction(Prospect $prospect)
    {
        $deleteForm = $this->createDeleteForm($prospect);

        return $this->render('prospect/show.html.twig', array(
            'prospect' => $prospect,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing prospect entity.
     *
     * @Route("/{id}/edit", name="prospect_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Prospect $prospect)
    {
        $deleteForm = $this->createDeleteForm($prospect);
        $editForm = $this->createForm('AppBundle\Form\ProspectType', $prospect);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prospect_edit', array('id' => $prospect->getId()));
        }

        return $this->render('prospect/edit.html.twig', array(
            'prospect' => $prospect,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a prospect entity.
     *
     * @Route("/{id}", name="prospect_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Prospect $prospect)
    {
        $form = $this->createDeleteForm($prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prospect);
            $em->flush();
        }

        return $this->redirectToRoute('prospect_index');
    }

    /**
     * Creates a form to delete a prospect entity.
     *
     * @param Prospect $prospect The prospect entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prospect $prospect)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prospect_delete', array('id' => $prospect->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
