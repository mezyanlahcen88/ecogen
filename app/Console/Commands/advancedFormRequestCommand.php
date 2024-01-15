<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class advancedFormRequestCommand extends Command
{
    protected $signature = 'make:formRequest {name : The name of the form request}';

    protected $description = 'Create a new Form request';

    public function handle()
    {

        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);



        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/formRequest.stub'));


        // Replace placeholders in the stub content
        $stub = str_replace('{{model}}', $name, $stub);
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);

        $filePath = app_path('Http/Requests/Store' . $name. 'Request.php');

        if (File::exists($filePath)) {
            $this->error('Form request file already exists!');
            return;
        }
        File::put($filePath, $stub);
        $this->info('Form request file created successfully!');
    }
}
