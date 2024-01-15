<?php

namespace Database\Seeders;

// use App\Models\Permission as ModelsPermission;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        DB::table('permissions')->insert([
            ['name' => 'user-create', 'libele' => 'Ajouter utilisateur', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-show', 'libele' => 'Voir utilisateur', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-edit', 'libele' => 'Modifier utilisateur', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-delete', 'libele' => 'Supprimer utilisateur', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-list', 'libele' => 'Liste des utilsateurs', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-trashed', 'libele' => 'Liste des utilsateurs supprimées', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-forse-delete', 'libele' => 'Forcer la supprission', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user-restore', 'libele' => 'Restaurer l\'utilisateur', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'role-create', 'libele' => 'Ajouter role', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-show', 'libele' => 'Voir role', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-edit', 'libele' => 'Modifier role', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-delete', 'libele' => 'Supprimer role', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-list', 'libele' => 'Liste des roles', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-trashed', 'libele' => 'Liste des roles supprimées', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-forse-delete', 'libele' => 'Forcer la supprission', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'role-restore', 'libele' => 'Restaurer le role', 'guard_name' => 'web', 'groupe_id' =>2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],




            ['name' => 'systemlanguage-create', 'libele' => 'System language Create', 'guard_name' => 'web', 'groupe_id' =>3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-show', 'libele' => 'System language Show', 'guard_name' => 'web', 'groupe_id' =>3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-edit', 'libele' => 'System language Edit', 'guard_name' => 'web', 'groupe_id' =>3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-delete', 'libele' => 'System language Delete', 'guard_name' => 'web', 'groupe_id' =>3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-list', 'libele' => 'System language Featured', 'guard_name' => 'web', 'groupe_id' =>3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'systemlanguage-translation', 'libele' => 'System languageTranslation', 'guard_name' => 'web', 'groupe_id' =>3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'setting-create', 'libele' => 'Setting Create', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-show', 'libele' => 'Setting Show', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-edit', 'libele' => 'Setting Edit', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-delete', 'libele' => 'Setting Delete', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'setting-list', 'libele' => 'Setting List', 'guard_name' => 'web', 'groupe_id' =>4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],


            ['name' => 'sidebar-dashboard', 'libele' => 'Sidebar dashboard', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-manage-users', 'libele' => 'Sidebar manage users', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-ecommerce', 'libele' => 'Sidebar ecommerce', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-emails', 'libele' => 'Sidebar emails', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-countries', 'libele' => 'Sidebar countries', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-languages', 'libele' => 'Sidebar languages', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-payments', 'libele' => 'Sidebar payments', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'sidebar-settings', 'libele' => 'Sidebar settings', 'guard_name' => 'web', 'groupe_id' =>5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['name' => 'car-create', 'libele' => 'Ajouter voiture', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-show', 'libele' => 'Voir voiture', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-edit', 'libele' => 'Modifier voiture', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-delete', 'libele' => 'Supprimer voiture', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-list', 'libele' => 'Liste des voitures', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-trashed', 'libele' => 'Liste des voiture supprimées', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-forse-delete', 'libele' => 'Forcer la supprission', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'car-restore', 'libele' => 'Restaurer voiture', 'guard_name' => 'web', 'groupe_id' =>1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ]);


    }
}



