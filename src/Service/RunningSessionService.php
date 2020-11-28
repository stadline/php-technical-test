<?php

namespace App\Service;

class RunningSessionService
{
    /**
     * @param $distance
     * @param $duration
     *
     * @return float
     */
    public function calculateAverageSpeed($distance, $duration): float
    {
        return round($distance / ($duration / 60), 1);
    }

    /**
     * @param $distance
     * @param $duration
     *
     * @return int
     */
    public function calculatePace($distance, $duration): int
    {
        return (int)round($duration * 60 / $distance, 0);
    }
}
