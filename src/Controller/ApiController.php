<?php

namespace App\Controller;

use App\Entity\RunningSession;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /** @var SerializerInterface */
    protected $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/runs", methods={"GET"}, name="api_runs_list")
     *
     * @return JsonResponse
     */
    public function runningSessionList(): JsonResponse
    {
        $runs = $this->getDoctrine()->getRepository(RunningSession::class)->findAll();

        return new JsonResponse(
            $this->serializer->serialize($runs, JsonEncoder::FORMAT, ['groups' => 'running_session']),
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/users/{id}/runs", methods={"GET"}, name="api_user_runs_list")
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function userRunningSessionsList(Request $request): JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($request->get('id'));
        if (null === $user) {
            return new JsonResponse(['error' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $runs = $this->getDoctrine()->getRepository(RunningSession::class)->findBy(['user' => $user]);

        return new JsonResponse(
            $this->serializer->serialize($runs, JsonEncoder::FORMAT, ['groups' => 'running_session']),
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/runs/{id}", methods={"GET"}, name="api_run_show")
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function runningSessionDetail(Request $request): JsonResponse
    {
        $run = $this->getDoctrine()->getRepository(RunningSession::class)->find($request->get('id'));
        if (null === $run) {
            return new JsonResponse(['error' => 'Run not found'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse(
            $this->serializer->serialize($run, JsonEncoder::FORMAT, ['groups' => 'running_session']),
            Response::HTTP_OK,
            [],
            true
        );
    }
}
