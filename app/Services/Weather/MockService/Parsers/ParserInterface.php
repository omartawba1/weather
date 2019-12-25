<?php

namespace App\Services\Weather\MockService\Parsers;

interface ParserInterface
{
    /**
     * Parse API results to representable data.
     *
     * @return array
     */
    public function parse();
}
