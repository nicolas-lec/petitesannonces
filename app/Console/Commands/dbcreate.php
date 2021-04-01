<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $shemaName = $this->argument('name') ?: config('database.connections.mysql.database');

        $charset = config('database.connections.mysql.charset', 'utf8mb4');

        $collation = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');

        config(['database.connections.database' => null]);

        $query = "DROP DATABASE $shemaName; ";
        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $shemaName CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);

        echo "database $shemaName created success";

        config(['database.connections.database' => $shemaName]);
    }
}
