Result: if we run schedule:work via docker we don't trap signals. When running without docker we see it in logs

Without docker
```
php artisan schedule:work
CTRL+C
```

Log:
```
[2023-02-06 13:57:00] local.INFO: MAIN 1  
[2023-02-06 13:57:01] local.INFO: MAIN 2  
[2023-02-06 13:57:02] local.INFO: MAIN 3  
[2023-02-06 13:57:03] local.INFO: MAIN 4  
[2023-02-06 13:57:03] local.INFO: SIGNAL 2 1  
[2023-02-06 13:57:04] local.INFO: SIGNAL 2 2  
[2023-02-06 13:57:05] local.INFO: SIGNAL 2 3  
[2023-02-06 13:57:06] local.INFO: SIGNAL 2 4  
[2023-02-06 13:57:07] local.INFO: SIGNAL 2 5  
[2023-02-06 13:57:08] local.INFO: MAIN 5  
[2023-02-06 13:57:09] local.INFO: MAIN 6  
[2023-02-06 13:57:10] local.INFO: MAIN 7  
[2023-02-06 13:57:11] local.INFO: MAIN 8  
[2023-02-06 13:57:12] local.INFO: MAIN 9  
```

With docker
```
docker compose up
CTRL+C
```
Result without
```
[2023-02-06 13:57:00] local.INFO: MAIN 1  
[2023-02-06 13:57:01] local.INFO: MAIN 2  
[2023-02-06 13:57:02] local.INFO: MAIN 3  
[2023-02-06 13:57:03] local.INFO: MAIN 4  
[2023-02-06 13:57:03] local.INFO: MAIN 5  
[2023-02-06 13:57:04] local.INFO: MAIN 6 
[2023-02-06 13:57:05] local.INFO: MAIN 7 
[2023-02-06 13:57:06] local.INFO: MAIN 8  
[2023-02-06 13:57:07] local.INFO: MAIN 9  
```
