<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeBladeFolder extends Command
{
    protected $signature = 'make:Blade {folder : Le nom du dossier blade}';

    protected $description = 'Créer un dossier blade avec ses pages à partir d\'un modèle';

    public function handle()
    {
        $folder = $this->argument('folder');
        $singular = Str::singular($folder);
        $templatePath = resource_path('views/template');

        if (!File::exists($templatePath)) {
            $this->error("Le dossier de modèle 'template' n'existe pas.");
            return;
        }
        $stub = File::get(resource_path('views/template/create.blade.php'));
        $stub = str_replace('{name}', $folder, $stub);
        $stub = str_replace('{singular}', $singular, $stub);

        $bladePath = resource_path("views/{$folder}");

        if (File::exists($bladePath)) {
            $this->error("Le dossier blade '{$folder}' existe déjà.");
            return;
        }
 // Enregistrer le contenu du seeder dans le répertoire des seeders

        File::copyDirectory($templatePath, $bladePath);
        $bladeCreatePath = resource_path("views/{$folder}/create.blade.php");
        File::put($bladeCreatePath, $stub);
        $this->info("Dossier blade '{$folder}' créé avec succès.");
    }
}
