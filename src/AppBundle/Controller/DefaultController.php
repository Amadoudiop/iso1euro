<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prospect;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Eligible;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $prospect = new Prospect();


        $form = $this->createForm('AppBundle\Form\ProspectType', $prospect);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prospect);
            $em->flush();

            $eligible = $this->get(Eligible::class);
            $calcul = $eligible->calculation($prospect);

            //dump($calcul);die;

            // Show notice
            $this->addFlash(
                $calcul['status'],
                $calcul['message']
            );

            return $this->redirectToRoute('homepage', ['_fragment' => 'contact']);

        }

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'prospect' => $prospect,
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/elibilility/", name="eligibility",
     * options = { "expose" = true },
     * )
     * @Method({"GET", "POST"})
     */
    public function eligibilityAction(Request $request)
    {
        //$json = $request->request->get();
        dump('yo');
        //dump($json);
        die;
    }


}
