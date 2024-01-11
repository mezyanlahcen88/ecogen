<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class advancedControllerCommand extends Command
{
    protected $signature = 'make:ctl {name : The name of the controller class}';

    protected $description = 'Create a new Advaced controller class';

    public function handle()
    {
        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $pluralName = Str::plural($lowerName);
        $className = ucfirst($name) . 'Controller';
        $modelName = ucfirst($name);

        $stub = File::get(app_path('Console/Commands/stubs/controller.stub'));
        $stub = str_replace('{{class}}', $className, $stub);
        $stub = str_replace('{{model}}', $modelName, $stub);
        $stub = str_replace('{{lower}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $pluralName, $stub);

        $filePath = app_path('Http/Controllers/' . $className. '.php');

        if (File::exists($filePath)) {
            $this->error('Controller class already exists!');
            return;
        }

        File::put($filePath, $stub);

        $this->info('Controller class created successfully!');
    }
}
