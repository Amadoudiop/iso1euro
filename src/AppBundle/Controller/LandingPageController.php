<?php

namespace AppBundle\Controller;

use AppBundle\Entity\LandingPage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Landingpage controller.
 *
 * @Route("isoadmin/landingpage")
 */
class LandingPageController extends Controller
{
    /**
     * Lists all landingPage entities.
     *
     * @Route("/", name="landingPageIndex")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $landingPages = $em->getRepository('AppBundle:LandingPage')->findAll();

        return $this->render('landingPage/index.html.twig', array(
            'landingPages' => $landingPages,
        ));
    }

    /**
     * Creates a new landingPage entity.
     *
     * @Route("/new", name="landingPageNew")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $landingPage = new Landingpage();
        $form = $this->createForm('AppBundle\Form\LandingPageType', $landingPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($landingPage);
            $em->flush();

            return $this->redirectToRoute('landingPageShow', array('id' => $landingPage->getId()));
        }

        return $this->render('landingPage/new.html.twig', array(
            'landingPage' => $landingPage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a landingPage entity.
     *
     * @Route("/{id}", name="landingPageShow")
     * @Method("GET")
     */
    public function showAction(LandingPage $landingPage)
    {
        $deleteForm = $this->createDeleteForm($landingPage);

        return $this->render('landingPage/show.html.twig', array(
            'landingPage' => $landingPage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing landingPage entity.
     *
     * @Route("/{id}/edit", name="landingPageEdit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LandingPage $landingPage)
    {
        $deleteForm = $this->createDeleteForm($landingPage);
        $editForm = $this->createForm('AppBundle\Form\LandingPageType', $landingPage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('landingPageEdit', array('id' => $landingPage->getId()));
        }

        return $this->render('landingPage/edit.html.twig', array(
            'landingPage' => $landingPage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a landingPage entity.
     *
     * @Route("/{id}", name="landingPageDelete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LandingPage $landingPage)
    {
        $form = $this->createDeleteForm($landingPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($landingPage);
            $em->flush();
        }

        return $this->redirectToRoute('landingPageIndex');
    }

    /**
     * Creates a form to delete a landingPage entity.
     *
     * @param LandingPage $landingPage The landingPage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LandingPage $landingPage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('landingPageDelete', array('id' => $landingPage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
