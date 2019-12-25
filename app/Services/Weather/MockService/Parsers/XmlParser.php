<?php

namespace App\Services\Weather\MockService\Parsers;

use App\Models\City;
use App\Services\Weather\ServiceTrait;

class XmlParser extends ParserAbstract implements ParserInterface
{
    use ServiceTrait;

    /**
     * @inheritDoc
     */
    public function parse()
    {
        $filename = app_path('Services/Weather/MockService/MockData/temps.xml');
        $array    = json_decode(json_encode((array)simplexml_load_string(file_get_contents($filename))), true);
        $cityId   = City::firstOrCreate(['name' => $array['city']])->id;
        $date     = date('Y-m-d', $array['date']);

        if (isset($array['prediction'])) {
            foreach ($array['prediction'] as $item) {
                $this->createOrUpdatePrediction(
                    $this->serviceId, $cityId, $date, $item['time'], $item['value'],
                    $array['@attributes']['scale']
                );
            }
        }
    }
}
