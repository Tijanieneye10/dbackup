<?php

namespace App\Console\Commands;

use App\Models\Backup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $dbs = Backup::query()
                    ->where('status', true)
                    ->get();


        foreach($dbs as $db){

//            Config::set('backup.backup.name', $db->dbfolder);
            Config::set('backup.backup.destination.filename_prefix', "$db->dbfolder-");
            Config::set('database.connections.mysql.driver', $db->dbdriver);
            Config::set('database.connections.mysql.host', $db->dbhost);
            Config::set('database.connections.mysql.database', $db->dbname);
            Config::set('database.connections.mysql.username', $db->dbuser);
            Config::set('database.connections.mysql.password', Crypt::decrypt($db->dbpass));

            $this->backupCommand();
        }

    }

    protected function backupCommand(): int
    {
       return $this->call('backup:run', ['--only-db' => true]);
    }
}
