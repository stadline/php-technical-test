<?php

namespace App\Controller;

use App\Entity\RunningSession;
use App\Form\RunningSessionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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

    /**
     * @Route("/running_sessions", methods={"GET", "POST"}, name="new_run")
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function newRunningSession(Request $request)
    {
        $form = $this->createForm(RunningSessionFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $runningSession = $form->getData();
            $this->getUser()->addRunningSession($runningSession);

            $this->getDoctrine()->getManager()->persist($runningSession);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'running_session/new.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/running_sessions/{id}/update", methods={"GET", "POST"}, name="update_run")
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function updateRunningSession(Request $request)
    {
        $run = $this->getDoctrine()->getRepository(RunningSession::class)->findOneBy(
            [
                'id' => $request->get('id'),
                'user' => $this->getUser(),
            ]
        );
        if (null === $run) {
            throw new NotFoundHttpException('Course introuvable');
        }

        $form = $this->createForm(RunningSessionFormType::class, $run);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render(
            'running_session/update.html.twig',
            [
                'form' => $form->createView(),
                'run' => $run,
            ]
        );
    }
    /**
     * @Route("/running_sessions/{id}/remove", methods={"GET"}, name="remove_run")
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function removeRunningSession(Request $request)
    {
        $run = $this->getDoctrine()->getRepository(RunningSession::class)->findOneBy(
            [
                'id' => $request->get('id'),
                'user' => $this->getUser(),
            ]
        );
        if (null === $run) {
            throw new NotFoundHttpException('Course introuvable');
        }

        $this->getDoctrine()->getManager()->remove($run);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('home');
    }
}
