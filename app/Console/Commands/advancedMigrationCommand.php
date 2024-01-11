<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AdvancedMigrationCommand extends Command
{
    protected $signature = 'make:mgr {name : The name of the table}';

    protected $description = 'Generate a migration from an example file';

    public function handle()
    {
        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);

        $stub = File::get(app_path('Console/Commands/stubs/migration.stub'));

        // Replace occurrences of the "{name}" keyword with the provided table name argument
        $stub = str_replace('{name}', $plural, $stub);

        // Generate a unique migration file name
        $timestamp = now()->format('Y_m_d_His');
        $filename = $timestamp . '_create_' . $plural . '_table.php';

        // Save the migration content in the migrations directory
        $filePath = database_path('migrations/' . $filename);
        if (File::exists($filePath)) {
            $this->error('Migration file already exists!');
            return;
        }
        File::put($filePath, $stub);

        $this->info('Migration generated successfully: ' . $filename);
    }
}
