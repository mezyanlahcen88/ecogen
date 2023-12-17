<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearCommand extends Command
{
    protected $signature = 'clear';

    protected $description = 'Clear views and cache';

    public function handle()
    {
        $this->call('view:clear');
        $this->call('view:cache');

        $this->info('Views and cache cleared successfully!');
    }
}
