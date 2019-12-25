<?php

namespace App\Services\Weather;

use App\Models\Prediction;

trait ServiceTrait
{
    /**
     * @param $serviceId
     * @param $cityId
     * @param $date
     * @param $time
     * @param $value
     * @param $scaleFactor
     */
    protected function createOrUpdatePrediction($serviceId, $cityId, $date, $time, $value, $scaleFactor)
    {
        $scale         = $scaleFactor == config('weather.default_scale') ? 1 : config('weather.celsius_to_fahrenheit');
        $record        = Prediction::firstOrNew([
            'service_id' => $serviceId,
            'city_id'    => $cityId,
            'date'       => $date,
            'time'       => $time
        ]);
        $record->value = $scale * $value;
        $record->save();
    }
}
