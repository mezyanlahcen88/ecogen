<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'make:sed {name : Le nom de la table}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Générer un seeder à partir d\'un fichier modèle';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $plural = Str::plural($lowerName);
    // Vérifier si le fichier modèle existe

    $stub = File::get(app_path('Console/Commands/stubs/seeder.stub'));

    $className = ucfirst($name) . 'Seeder';




    // Remplacer les occurrences du mot-clé "{name}" par le nom de la table fourni en argument
    $stub = str_replace('{{name}}', $name, $stub);
    $stub = str_replace('{{class}}', $className, $stub);
    $stub = str_replace('{{plural}}', $plural, $stub);

    // Générer un nom de fichier de seeder unique
    $filename = $name . 'Seeder.php';

    // Enregistrer le contenu du seeder dans le répertoire des seeders
    $seederPath = database_path('seeders/' . $filename);
    File::put($seederPath, $stub);

    $this->info('Seeder généré avec succès : ' . $filename);
    }
}
