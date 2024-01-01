<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class allViewsCommand extends Command
{
    protected $signature = 'make:views {name}';

    protected $description = 'create all views';

    public function handle()
    {
        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);


        // view section
        // Generate the advanced index
        $this->call('make:index', [
            'name' => "{$name}",
        ]);
        // Generate the advanced create
        $this->call('make:create', [
            'name' => "{$name}",
        ]);
        // Generate the advanced edit
        $this->call('make:edit', [
            'name' => "{$name}",
        ]);
        // Generate the advanced trashed index
        $this->call('make:trashedindex', [
            'name' => "{$name}",
        ]);
        // Generate the advanced action
        $this->call('make:actions', [
            'name' => "{$name}",
        ]);
        // Generate the advanced trashed action
        $this->call('make:tactions', [
            'name' => "{$name}",
        ]);
        // Generate the advanced trashed table
        $this->call('make:trashedTable', [
            'name' => "{$name}",
        ]);
        // Generate the advanced  table
        $this->call('make:table', [
            'name' => "{$name}",
        ]);


    }
}
