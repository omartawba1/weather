<?php

namespace App\Console\Commands;

use App\Jobs\ProcessWeatherApi;
use App\Models\Service;
use Illuminate\Console\Command;

class UpdateWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the weather records in our DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {
        $services = Service::pluck('class');
        foreach ($services as $service) {
            ProcessWeatherApi::dispatch(app()->make($service));
        }

        return $this->info('updated');
    }
}
