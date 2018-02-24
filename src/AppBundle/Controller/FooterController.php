<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Footer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Footer controller.
 *
 * @Route("footer")
 */
class FooterController extends Controller
{
    /**
     * Lists all footer entities.
     *
     * @Route("/", name="footerIndex")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $footers = $em->getRepository('AppBundle:Footer')->findAll();

        return $this->render('footer/index.html.twig', array(
            'footers' => $footers,
        ));
    }

    /**
     * Creates a new footer entity.
     *
     * @Route("/new", name="footerNew")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $footer = new Footer();
        $form = $this->createForm('AppBundle\Form\FooterType', $footer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($footer);
            $em->flush();

            return $this->redirectToRoute('footerShow', array('id' => $footer->getId()));
        }

        return $this->render('footer/new.html.twig', array(
            'footer' => $footer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a footer entity.
     *
     * @Route("/{id}", name="footerShow")
     * @Method("GET")
     */
    public function showAction(Footer $footer)
    {
        $deleteForm = $this->createDeleteForm($footer);

        return $this->render('footer/show.html.twig', array(
            'footer' => $footer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing footer entity.
     *
     * @Route("/{id}/edit", name="footerEdit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Footer $footer)
    {
        $deleteForm = $this->createDeleteForm($footer);
        $editForm = $this->createForm('AppBundle\Form\FooterType', $footer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('footerEdit', array('id' => $footer->getId()));
        }

        return $this->render('footer/edit.html.twig', array(
            'footer' => $footer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a footer entity.
     *
     * @Route("/{id}", name="footerDelete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Footer $footer)
    {
        $form = $this->createDeleteForm($footer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($footer);
            $em->flush();
        }

        return $this->redirectToRoute('footerIndex');
    }

    /**
     * Creates a form to delete a footer entity.
     *
     * @param Footer $footer The footer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Footer $footer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('footerDelete', array('id' => $footer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
