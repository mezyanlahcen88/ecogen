<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteCommand extends Command
{
    protected $signature = 'make:del {model : The name of the model}';

    protected $description = 'Delete generated files for a specific model';

    public function handle()
    {
        $model = $this->argument('model');
        $lowerModel = strtolower($model);
        $plural = Str::plural($lowerModel);

        $filesToDelete = [app_path("Models/{$model}.php"),
        database_path("migrations/*_create_{$plural}_table.php"),
        database_path("seeders/{$model}Seeder.php"),
        database_path("factories/{$model}Factory.php"),
        app_path("Forms/{$model}Form.php"),
        app_path("DTO/{$model}DTO.php"),
        app_path("Http/Controllers/{$model}Controller.php"),
        app_path("Http/Requests/Store{$model}Request.php"),
        base_path("routes/base/{$lowerModel}Route.php"),
    ];

        foreach ($filesToDelete as $file) {
            $matchingFiles = glob($file);
            foreach ($matchingFiles as $matchingFile) {
                File::delete($matchingFile);
                $this->info("File deleted: {$matchingFile}");
            }
        }
        // get the directory first
        $directoryPath = resource_path("views/{$plural}");
        File::deleteDirectory($directoryPath);
        $this->info('Deletion of generated files for model ' . $model . ' completed.');
    }
}
