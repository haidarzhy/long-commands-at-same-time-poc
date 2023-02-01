<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class SecondLongCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'long:two';

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
        Log::info('Second command started at ' . Carbon::now()->toDateTimeString());
        sleep(120);
        Log::info('Second command finished at ' . Carbon::now()->toDateTimeString());

        return Command::SUCCESS;
    }
}
