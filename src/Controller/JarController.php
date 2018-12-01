<?php

namespace App\Controller;


use App\Form\JarType;
use App\Service\JarManager;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JarController extends AbstractController
{
    /**
     * @Route("/jars", name="jars.dashboard")
     * @param JarManager $jarManager
     * @return Response
     */
    public function showDashboard(JarManager $jarManager): Response
    {
        $jars = $jarManager->getAllJars();
        $form = $this->createForm(JarType::class);
        return $this->render('Jars/dashboard.html.twig', [
            'form' => $form->createView(),
            'jarCollection' => $jars
        ]);
    }

    /**
     * @Route("/jars/new", name="jars.new")
     * @param Request $request
     * @param JarManager $jarManager
     * @return JsonResponse
     */
    public function createJar(Request $request, JarManager $jarManager): JsonResponse
    {
        $form = $this->createForm(JarType::class);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try {
                $jarManager->save($form->getData());
            } catch (ORMException $e) {
                return new JsonResponse(false);
            }

            return new JsonResponse(true);
        }

        return new JsonResponse(false);
    }
}