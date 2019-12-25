<?php

namespace App\Services\Weather\MockService\Parsers;

use App\Models\City;
use App\Services\Weather\ServiceTrait;

class JsonParser extends ParserAbstract implements ParserInterface
{
    use ServiceTrait;

    /**
     * @inheritDoc
     */
    public function parse()
    {
        $filename = app_path('Services/Weather/MockService/MockData/temps.json');
        $data     = json_decode(file_get_contents($filename), true);
        if (isset($data['predictions']['prediction'])) {
            $cityId = City::firstOrCreate(['name' => $data['predictions']['city']])->id;
            $date   = date('Y-m-d', $data['predictions']['date']);
            foreach ($data['predictions']['prediction'] as $item) {
                $this->createOrUpdatePrediction(
                    $this->serviceId, $cityId, $date, $item['time'], $item['value'],
                    $data['predictions']['-scale']
                );
            }
        }
    }
}
