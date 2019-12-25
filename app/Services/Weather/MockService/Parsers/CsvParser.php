<?php

namespace App\Services\Weather\MockService\Parsers;

use App\Imports\PredictionCsvImport;

class CsvParser extends ParserAbstract implements ParserInterface
{
    /**
     * @inheritDoc
     */
    public function parse()
    {
        $filename = app_path('Services/Weather/MockService/MockData/temps.csv');
        (new PredictionCsvImport($this->serviceId))->import($filename, null, \Maatwebsite\Excel\Excel::CSV);
    }
}
