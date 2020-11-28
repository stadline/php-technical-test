<?php

namespace App\Controller;

use App\Entity\RunningSession;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $runs = $this->getDoctrine()->getRepository(RunningSession::class)->findBy(['user' => $this->getUser()]);

        return $this->render('home.html.twig', ['runs' => $runs]);
    }
}
