<?php
/**
 * Created by PhpStorm.
 * User: Benouz
 * Date: 10-05-18
 * Time: 11:35
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default_index")
     *
     * @return Response
     */
    public function index()
    {
        return $this->render('Default/index.html.twig');
    }
}