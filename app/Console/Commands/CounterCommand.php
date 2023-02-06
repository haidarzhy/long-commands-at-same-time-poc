<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CounterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tick';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->trap([SIGTERM, SIGQUIT, SIGINT], function ($signal) {
            $t = 1;
            while($t <= 5){
                Log::info('SIGNAL ' . $signal . ' ' . $t);
                sleep(1);
                $t++;
            }
            return Command::SUCCESS;
        });

        $t = 1;
        while($t <= 10){
            Log::info('MAIN ' . $t);
            sleep(1);
            $t++;
        }

        return Command::SUCCESS;
    }
}
