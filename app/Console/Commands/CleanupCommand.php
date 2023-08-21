<?php

namespace App\Console\Commands;

use App\Models\Backup;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;

class CleanupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleanup database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $dbs = Backup::query()
            ->where('status', true)
            ->get();

        foreach($dbs as $db){
            Config::set('backup.backup.name', $db->dbfolder);
            $this->cleanupCommand();
        }

    }

    protected function cleanupCommand(): int
    {
        return $this->call('backup:clean');
    }
}
