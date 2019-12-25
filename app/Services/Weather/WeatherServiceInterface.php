<?php

namespace App\Services\Weather;

interface WeatherServiceInterface
{
    /**
     * List the predictions.
     *
     * @return array
     */
    public function getPredictions();
}
