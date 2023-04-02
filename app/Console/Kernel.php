<?php

namespace App\Console;

use App\Console\Commands\GiveCreditsToUsers;
use App\Console\Commands\SendFeatured;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(SendFeatured::class)->monthly()->tuesdays()->at('20:00');
        $schedule->command(GiveCreditsToUsers::class, [
            '--credits' => 100,
        ])->monthly()->tuesdays()->at('21:00');
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
