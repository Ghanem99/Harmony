<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class migrateFreshSeedDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:mfs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to run php artisan migrate:fresh --seed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Command to run php artisan migrate:fresh --seed
        $this->call('migrate:fresh', [
            '--seed' => true,
        ]);
        // the pre command was php artisan migrate:fresh --seed

        $this->info('Database migrated and seeded successfully.');
    }
}
