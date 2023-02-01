<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class ThirdLongCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'long:three';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Third command started at ' . Carbon::now()->toDateTimeString());
        sleep(120);
        Log::info('Third command finished at ' . Carbon::now()->toDateTimeString());

        return Command::SUCCESS;
    }
}
