<?php

namespace App\EntityListener;

use App\Entity\RunningSession;
use App\Service\RunningSessionService;
use Doctrine\ORM\Event\LifecycleEventArgs;

class RunningSessionEntityListener
{
    /** @var RunningSessionService */
    protected $runningSessionService;

    /**
     * @param RunningSessionService $runningSessionService
     */
    public function __construct(RunningSessionService $runningSessionService)
    {
        $this->runningSessionService = $runningSessionService;
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->setAverageSpeedAndPage($args->getEntity());
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->setAverageSpeedAndPage($args->getEntity());
    }

    /**
     * @param RunningSession $runningSession
     */
    protected function setAverageSpeedAndPage(RunningSession $runningSession)
    {
        $runningSession->setAverageSpeed(
            $this->runningSessionService->calculateAverageSpeed(
                $runningSession->getDistance(),
                $runningSession->getDuration()
            )
        );
        $runningSession->setPace(
            $this->runningSessionService->calculatePace(
                $runningSession->getDistance(),
                $runningSession->getDuration()
            )
        );
    }
}
