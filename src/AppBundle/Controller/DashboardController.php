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

class DashboardController extends Controller
{

    /**
     * @Route("/ahha/dashboard", name="dashboard")
     * @return Response
     */
    public function indexAction()
    {

        return $this->render('admin/dashboard.html.twig', []);
    }
}