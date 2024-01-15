<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class DTOCommand extends Command
{
    protected $signature = 'make:dto {name : The name of the dto class}';

    protected $description = 'Create a new dto class';

    public function handle()
    {
        $name = $this->argument('name');
        $className = ucfirst($name) . 'Dto';
        $modelName = ucfirst($name);
        $lowerName = strtolower($name);
        $pluralName = Str::plural($lowerName);

        $stub = File::get(app_path('Console/Commands/stubs/dto.stub'));
        $stub = str_replace('{{class}}', $className, $stub);
        $stub = str_replace('{{model}}', $modelName, $stub);
        $stub = str_replace('{{plural}}', $pluralName, $stub);


        $filePath = app_path('Dto/' . $className . '.php');

        if (File::exists($filePath)) {
            $this->error('Dto class already exists!');
            return;
        }

        File::put($filePath, $stub);

        $this->info('Dto class created successfully!');
    }
}

