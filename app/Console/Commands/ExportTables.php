<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export all tables from the database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $outputFile = storage_path('app/tables.sql');
        $command = sprintf('mysqldup--user=%s-- password=%s %s>%s',$username,$password,$database,$outputFile);
        exec($command);
        $this->info('Tables exported successfully');
    }
}
