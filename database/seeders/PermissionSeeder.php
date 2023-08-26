<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

//        $routes = Route::getRoutes();

//        foreach ($routes as $route) {
//            $name = $route->getName();
//
//            $_action = explode('.', $name);
//            if (empty($_action[0]) || in_array($_action[0], ['verification', 'password', 'login', 'logout', 'debugbar', 'livewire', 'ignition', 'telescope'])) {
//                continue;
//            }
//
//            if ($name) {
//                // Create a new permission if it doesn't exist
//                Permission::firstOrCreate(['name' => $name]);
//            }
//        }

	    Permission::firstOrCreate(['name' => 'dashboard']);

        // create super admin role and assign all permissions with the user
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

	    // assign role to user
	    $user = \App\Models\User::create([
			    'name' => 'Super Admin',
			    'first_name' => 'Super',
			    'last_name' => 'Admin',
			    'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
		    ]);
	    $user->assignRole($role);

        Role::create(['name' => 'client_users']);
        Role::create(['name' => 'divisional_reps']);
    }
}
