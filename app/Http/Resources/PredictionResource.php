<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PredictionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $scale = $request->get('scale') == config('weather.default_scale') ? 1 : config('weather.celsius_to_fahrenheit');
        $data  = [];
        foreach ($this->resource as $item) {
            $data[] = [
                'time'  => $item['time'],
                'temperature' => $scale * $item['temperature'],
            ];
        }
        return $data;
    }
}
