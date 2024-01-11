<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class advancedEditCommand extends Command
{
    protected $signature = 'make:edit {name : The name of the edit blade}';

    protected $description = 'edit a new edit blade';

    public function handle()
    {

        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        // get the directory first
        $directoryPath = resource_path("views/{$plural}");

        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/template/edit.stub'));

        // Replace placeholders in the stub content
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);
        $stub = str_replace('{{model}}', $name, $stub);


        // edit the Blade view file inside the new directory
        $filePath = "{$directoryPath}/edit.blade.php";
        File::put($filePath, $stub);

        $this->info('edit blade editd successfully!');
    }

}
