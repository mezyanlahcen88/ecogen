<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class advancedActionsCommand extends Command
{
    protected $signature = 'make:actions {name : The name of the simple actions blade}';

    protected $description = 'Create a new action blade';

    public function handle()
    {

        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        // Create the directory first
        $directoryPath = resource_path("views/{$plural}");

        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/template/actions.stub'));


        // Replace placeholders in the stub content
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);

        // Create the Blade view file inside the new directory
        $filePath = "{$directoryPath}/actions.blade.php";
        File::put($filePath, $stub);

        $this->info('actions blade created successfully!');
    }

}
