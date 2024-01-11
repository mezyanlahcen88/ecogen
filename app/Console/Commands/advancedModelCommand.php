<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class advancedModelCommand extends Command
{
    protected $signature = 'make:mdl {name : The name of the Model class}';

    protected $description = 'Create a new Model class';

    public function handle()
    {
        $name = $this->argument('name');
        $className = ucfirst($name);
        $modelName = ucfirst($name);
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        $stub = File::get(app_path('Console/Commands/stubs/model.stub'));
        $stub = str_replace('{{class}}', $className, $stub);
        $stub = str_replace('{{model}}', $modelName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);

        $filePath = app_path('Models/' . $className . '.php');

        if (File::exists($filePath)) {
            $this->error('Model class already exists!');
            return;
        }

        File::put($filePath, $stub);

        $this->info('Model class created successfully!');
    }

}
