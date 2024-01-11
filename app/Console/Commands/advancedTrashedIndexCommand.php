<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class advancedTrashedIndexCommand extends Command
{
    protected $signature = 'make:trashedindex {name : The name of the trashed Index blade}';

    protected $description = 'Create a new trashed Index blade';

    public function handle()
    {

        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        // get the directory
        $directoryPath = resource_path("views/{$plural}");

        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/template/trashedIndex.stub'));

        // Replace placeholders in the stub content
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);

        // Create the Blade view file inside the new directory
        $filePath = "{$directoryPath}/trashedIndex.blade.php";
        File::put($filePath, $stub);

        $this->info('trashed Index blade created successfully!');
    }

}
