<?php

namespace App\Jobs;

use App\Services\Weather\WeatherServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessWeatherApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var WeatherServiceInterface
     */
    protected $service;

    /**
     * Create a new job instance.
     *
     * @param WeatherServiceInterface $service
     */
    public function __construct(WeatherServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->service->getPredictions();
    }
}
