<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckDBConnection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_db_connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the database is alive or not';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $resp = Command::FAILURE;
        $retryCount = 10;
        $retryInterval = 2; //sec

        for ($i = 1; $i <= $retryCount; $i++) {
            echo 'Connecting to host:' . config('database.connections.' . config('database.default') . '.host') . ' try ' . $i . '..';
            try {
                DB::connection()->getPdo();
                echo 'Database connection was successful' . PHP_EOL;
                $resp = Command::SUCCESS;
                break;
            } catch (\Exception $e) {
                echo 'error:' . $e->getMessage() . PHP_EOL;
                sleep($retryInterval);
            }
        }

        return $resp;
    }
}
