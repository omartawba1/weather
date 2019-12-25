<?php

namespace App\Services\Weather\MockService;

use App\Services\Weather\MockService\Parsers\ParserInterface;
use App\Services\Weather\WeatherServiceInterface;

class MockService implements WeatherServiceInterface
{
    /**
     * @var ParserInterface
     */
    private $formatter;

    /**
     * MockService constructor.
     * @param ParserInterface $formatter
     */
    public function __construct(ParserInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @inheritDoc
     */
    public function getPredictions()
    {
        return $this->formatter->parse();
    }
}
