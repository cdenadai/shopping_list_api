<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\BusinessRules\Base\Commands\MakeAll::class,
        \App\BusinessRules\Base\Commands\MakeModel::class,

        \App\BusinessRules\Base\Commands\MakeControllers::class,
        \App\BusinessRules\Base\Commands\MakeCreateController::class,
        \App\BusinessRules\Base\Commands\MakeUpdateController::class,
        \App\BusinessRules\Base\Commands\MakeGetAllController::class,
        \App\BusinessRules\Base\Commands\MakeGetByIdController::class,
        \App\BusinessRules\Base\Commands\MakeDeleteController::class,

        \App\BusinessRules\Base\Commands\MakeServiceInterfaces::class,
        \App\BusinessRules\Base\Commands\MakeCreateServiceInterface::class,
        \App\BusinessRules\Base\Commands\MakeUpdateServiceInterface::class,
        \App\BusinessRules\Base\Commands\MakeGetByIdServiceInterface::class,
        \App\BusinessRules\Base\Commands\MakeGetAllServiceInterface::class,
        \App\BusinessRules\Base\Commands\MakeDeleteServiceInterface::class,

        \App\BusinessRules\Base\Commands\MakeServices::class,
        \App\BusinessRules\Base\Commands\MakeCreateService::class,
        \App\BusinessRules\Base\Commands\MakeUpdateService::class,
        \App\BusinessRules\Base\Commands\MakeGetByIdService::class,
        \App\BusinessRules\Base\Commands\MakeGetAllService::class,
        \App\BusinessRules\Base\Commands\MakeDeleteService::class,

        \App\BusinessRules\Base\Commands\MakeValidator::class,
        \App\BusinessRules\Base\Commands\MakeValidatorInterface::class,

        \App\BusinessRules\Base\Commands\MakeServiceProvider::class,
        \App\BusinessRules\Base\Commands\MakeRoutes::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
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
