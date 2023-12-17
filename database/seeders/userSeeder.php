<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'uuid'=>Str::uuid(),
            'first_name' => 'Hassan',
            'last_name' => 'Mzn',
            'email' => 'admin@admin.com',
            'active' =>1,
            'roles_name' => ["admin"],
            'phone' => "+212602086429",
            'picture' => "user_df.jpg",
            'address' => "maroc kenitra elwafaa",
            'super_admin' => 1,
            'password' => bcrypt('azerty123'),

            ]);

            $role = Role::create(['name' => 'admin']);

            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $user = User::latest()->first();
            $user->assignRole(1);
    }
}


