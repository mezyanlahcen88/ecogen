<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FormCommand extends Command
{
    protected $signature = 'make:form {name : The name of the form class}';

    protected $description = 'Create a new form class';

    public function handle()
    {
        $name = $this->argument('name');
        $className = ucfirst($name) . 'Form';

        $stub = File::get(app_path('Console/Commands/stubs/form.stub'));
        $stub = str_replace('{{class}}', $className, $stub);

        $filePath = app_path('Forms/' . $className . '.php');

        if (File::exists($filePath)) {
            $this->error('Form class already exists!');
            return;
        }

        File::put($filePath, $stub);

        $this->info('Form class created successfully!');
    }
}
