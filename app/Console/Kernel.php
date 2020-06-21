<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
//use App\Http\Services\BitacoraService;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        '\App\Console\Commands\EtlAuto'
    ];

     // private $bitacora_service;

     // public function __construct(BitacoraService $bitacora_service)
     // {
     //     $this->bitacora_service = $bitacora_service;
     // }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //todos los dias a la media noche
        $schedule->command('elt:auto')->dailyAt('00:00');
       // $this->bitacora_service->bitacoraPost("ETL ejecutado de forma automática");
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
