<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class advancedRouteCommand extends Command
{
    protected $signature = 'make:route {name : The name of the route}';

    protected $description = 'Create a new route';

    public function handle()
    {

        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);



        // Get the content of the stub file
        $stub = File::get(app_path('Console/Commands/stubs/route.stub'));


        // Replace placeholders in the stub content
        $stub = str_replace('{{model}}', $name, $stub);
        $stub = str_replace('{{lowerName}}', $lowerName, $stub);
        $stub = str_replace('{{plural}}', $plural, $stub);

        $filePath = base_path('routes/base/' . $lowerName.'Route.php');

        if (File::exists($filePath)) {
            $this->error('route file already exists!');
            return;
        }
        File::put($filePath, $stub);
        $this->info('route file created successfully!');
    }
}
