<?php
/**
 * Created by Evis Bregu <evis.bregu@gmail.com>.
 * Date: 1/23/18
 * Time: 10:27 AM
 */

namespace AppBundle\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @internal param Request $request
     */
    public function dashboardAction(Request $request)
    {
        dump($request);
        return new Response("OK", 200);
    }
}