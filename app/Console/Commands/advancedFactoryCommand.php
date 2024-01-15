<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AdvancedFactoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:fac {name : The name of the model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a factory from a model file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Check if the model file exists
        $stub = File::get(app_path('Console/Commands/stubs/factory.stub'));

        $className = ucfirst($name) . 'Factory';

        // Replace occurrences of the "{{class}}" keyword with the provided model name argument
        $factoryContent = str_replace('{{class}}', $className, $stub);

        // Generate a unique factory file name
        $filename = $name . 'Factory.php';

        // Save the factory content in the factories directory
        $filePath = database_path('factories/' . $filename);
        if (File::exists($filePath)) {
            $this->error('Factory file already exists!');
            return;
        }
        File::put($filePath, $factoryContent);

        $this->info('Factory generated successfully: ' . $filename);
    }
}
