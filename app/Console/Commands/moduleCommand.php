<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class moduleCommand extends Command
{
    protected $signature = 'make:module {name}';

    protected $description = 'Speed up the creation of New Record';

    public function handle()
    {
        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        // Generate the advanced model
        $this->call('make:mdl', [
            'name' => "{$name}",
        ]);

        // Generate the migration
        $this->call('make:mgr', [
            'name' => "{$plural}",
        ]);
        // Generate the Factory
        $this->call('make:fac', [
            'name' => "{$name}",
        ]);

        // Generate the seeder
        $this->call('make:sed', [
            'name' => "{$name}",
        ]);

        // Generate the form
        // $this->call('make:form', [
        //     'name' => "{$name}",
        // ]);

        // Generate the dto
        // $this->call('make:dto', [
        //     'name' => "{$name}",
        // ]);

        // Generate the advanced controller
        $this->call('make:ctl', [
            'name' => "{$name}",
        ]);

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

        // Generate the advanced form request
        $this->call('make:formRequest', [
            'name' => "{$name}",
        ]);
        // Route section
        // Generate the advanced route
        $this->call('make:route', [
            'name' => "{$name}",
        ]);
    }
}
