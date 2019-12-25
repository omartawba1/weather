<?php

namespace App\Imports;

use App\Models\City;
use App\Services\Weather\ServiceTrait;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

class PredictionCsvImport implements ToCollection
{
    use Importable, ServiceTrait;

    /**
     * @var int
     */
    protected $serviceId;

    /**
     * PredictionCsvImport constructor.
     * @param int $serviceId
     */
    public function __construct(int $serviceId)
    {
        $this->serviceId = $serviceId;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $count = $collection->count();
        if ($count > 1) {
            $cityId = City::firstOrCreate(['name' => $collection[1][1]])->id;
            $date   = date('Y-m-d', $collection[1][2]);
            for ($i = 1; $i < $count; $i++) {
                $this->createOrUpdatePrediction(
                    $this->serviceId, $cityId, $date, $collection[$i][3],
                    $collection[$i][4], $collection->first()[0]
                );
            }
        }
    }
}
