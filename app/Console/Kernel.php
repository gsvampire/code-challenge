<?php

namespace App\Console;

use App\Console\Commands\OrderData;
use App\Console\Commands\payOrderStatus;
use App\Console\Commands\RetryOrder;
use App\Console\Commands\WarningPoints;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * @var string[]
     */
    protected $commands = [
        RetryOrder::class,
        OrderData::class,
        payOrderStatus::class,
        WarningPoints::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //订单重试，每2分钟执行一次
        $schedule->command('retry:order')->cron("*/2 * * * *");
        //订单统计
        $schedule->command('order:data')->dailyAt('00:30');
        //畅由积分状态获取
        $schedule->command('cy:payOrderStatus')->cron("*/2 * * * *");
        //积分预警，2分钟执行一次
        $schedule->command('points:warning')->cron("*/2 * * * *");
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
