<?php

namespace App\Console;

use App\Models\Setting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $settings = Setting::first();

        if($settings->status){
            $this->backupDB($settings, $schedule);
            $this->cleanupDB($settings, $schedule);
        }

    }



    protected function backupDB($settings, Schedule $schedule): void
    {

        if($settings->period === 'everyMinute'){
            $schedule->command('app:backup')->everyFiveMinutes();
        }

        if($settings->period === 'weekly'){
            $schedule->command('app:backup')->weekly()->at($settings->time);
        }

        if($settings->period === 'weekend'){
            $schedule->command('app:backup')->weekends()->at($settings->time);
        }

        if($settings->period === 'monthly'){
            $schedule->command('app:backup')->weekends()->at($settings->time);
        }
    }

    protected function cleanupDB($settings, Schedule $schedule): void
    {

        if($settings->cleanup_period === 'everyMinute'){
            $schedule->command('backup:clean')->everyFifteenMinutes();
        }

        if($settings->cleanup_period === 'weekly'){
            $schedule->command('backup:clean')->weekly()->at($settings->cleanup_time);
        }

        if($settings->cleanup_period === 'weekend'){
            $schedule->command('backup:clean')->weekends()->at($settings->cleanup_time);
        }

        if($settings->cleanup_period === 'monthly'){
            $schedule->command('backup:clean')->weekends()->at($settings->cleanup_time);
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
