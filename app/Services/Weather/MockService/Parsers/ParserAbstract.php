<?php

namespace App\Services\Weather\MockService\Parsers;

abstract class ParserAbstract
{
    /**
     * @var int
     */
    protected $serviceId;

    /**
     * CsvParser constructor.
     * @param int $serviceId
     */
    public function __construct(int $serviceId)
    {
        $this->serviceId = $serviceId;
    }
}
