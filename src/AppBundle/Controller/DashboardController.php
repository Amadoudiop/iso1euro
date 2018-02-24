<?php
/**
 * Created by PhpStorm.
 * User: creemson
 * Date: 22/11/17
 * Time: 12:05
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{

    /**
     * @Route("/isoadmin/", name="dashboard")
     * @return Response
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $nbProspect = $em->getRepository('AppBundle:Prospect')
            ->createQueryBuilder('t')
            ->select('count(t.id)')
            //->where('count(t.id)')
            ->getQuery()->getSingleScalarResult();

//        $nbOeuvres = $em->getRepository('AppBundle:Oeuvre')
//            ->createQueryBuilder('t')
//            ->select('count(t.id)')
//            ->getQuery()->getSingleScalarResult();*/

        return $this->render('admin/dashboard.html.twig', [
            'nbProspect' => $nbProspect,

        ]);
    }
}