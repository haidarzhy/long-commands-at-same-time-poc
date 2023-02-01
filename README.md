Result: if we have long commads scheduled for the same time they will work one after each other even if time changed by the moment previous command finished.


Kernel
```
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(FirstLongCommand::class)->everyFifteenMinutes();
        $schedule->command(SecondLongCommand::class)->everyFifteenMinutes();
        $schedule->command(ThirdLongCommand::class)->everyFifteenMinutes();
    }
```

Command
```
    public function handle()
    {
        Log::info('First command started at ' . Carbon::now()->toDateTimeString());
        sleep(120);
        Log::info('First command finished at ' . Carbon::now()->toDateTimeString());

        return Command::SUCCESS;
    }
```

Result
```
[2023-02-01 14:00:00] local.INFO: First command started at 2023-02-01 14:00:00  
[2023-02-01 14:02:00] local.INFO: First command finished at 2023-02-01 14:02:00  
[2023-02-01 14:02:00] local.INFO: Second command started at 2023-02-01 14:02:00  
[2023-02-01 14:04:00] local.INFO: Second command finished at 2023-02-01 14:04:00  
[2023-02-01 14:04:00] local.INFO: Third command started at 2023-02-01 14:04:00  
[2023-02-01 14:06:00] local.INFO: Third command finished at 2023-02-01 14:06:00  
```
