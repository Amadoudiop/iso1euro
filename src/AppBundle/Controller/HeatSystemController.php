<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HeatSystem;
use AppBundle\Service\FileHandler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Heatsystem controller.
 *
 * @Route("isoadmin/heat-system")
 */
class HeatSystemController extends Controller
{
    /**
     * Lists all heatSystem entities.
     *
     * @Route("s", name="heatSystemIndex")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $heatSystems = $em->getRepository('AppBundle:HeatSystem')->findAll();

        return $this->render('heatSystem/index.html.twig', array(
            'heatSystems' => $heatSystems,
        ));
    }

    /**
     * Creates a new heatSystem entity.
     *
     * @Route("/new", name="heatSystemNew")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $heatSystem = new Heatsystem();
        $form = $this->createForm('AppBundle\Form\HeatSystemType', $heatSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $file = $form['img']->getData();

            if( $file != null )
            {

                $fileHandler = $this->get(FileHandler::class);
                $fileName = $fileHandler->upload($file,  $this->getParameter('simple_directory'));

                $heatSystem->setImg($fileName['name']);
            }
            $em->persist($heatSystem);
            $em->flush();

            return $this->redirectToRoute('heatSystemIndex', array('id' => $heatSystem->getId()));
        }

        return $this->render('heatSystem/new.html.twig', array(
            'heatSystem' => $heatSystem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a heatSystem entity.
     *
     * @Route("/{id}", name="heatSystemShow")
     * @Method("GET")
     */
    public function showAction(HeatSystem $heatSystem)
    {
        $deleteForm = $this->createDeleteForm($heatSystem);

        return $this->render('heatSystem/show.html.twig', array(
            'heatSystem' => $heatSystem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing heatSystem entity.
     *
     * @Route("/{id}/edit", name="heatSystemEdit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HeatSystem $heatSystem)
    {
        $deleteForm = $this->createDeleteForm($heatSystem);
        $editForm = $this->createForm('AppBundle\Form\HeatSystemType', $heatSystem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $file = $editForm['img']->getData();

            if( $file != null )
            {

                $fileHandler = $this->get(FileHandler::class);
                $fileName = $fileHandler->upload($file,  $this->getParameter('simple_directory'));

                $heatSystem->setImg($fileName['name']);
            }


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('heatSystemEdit', array('id' => $heatSystem->getId()));
        }

        return $this->render('heatSystem/edit.html.twig', array(
            'heatSystem' => $heatSystem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a heatSystem entity.
     *
     * @Route("/{id}", name="heatSystemDelete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HeatSystem $heatSystem)
    {
        $form = $this->createDeleteForm($heatSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($heatSystem);
            $em->flush();
        }

        return $this->redirectToRoute('heatSystem_index');
    }

    /**
     * Creates a form to delete a heatSystem entity.
     *
     * @param HeatSystem $heatSystem The heatSystem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HeatSystem $heatSystem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('heatSystemDelete', array('id' => $heatSystem->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
