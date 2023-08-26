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
	    Permission::firstOrCreate(['name' => 'dashboard.view']);
	    Permission::firstOrCreate(['name' => 'users.list']);
	    Permission::firstOrCreate(['name' => 'users.create']);
	    Permission::firstOrCreate(['name' => 'users.edit']);
	    Permission::firstOrCreate(['name' => 'users.delete']);
	    Permission::firstOrCreate(['name' => 'roles.list']);
	    Permission::firstOrCreate(['name' => 'roles.create']);
	    Permission::firstOrCreate(['name' => 'roles.edit']);
	    Permission::firstOrCreate(['name' => 'regions.list']);
	    Permission::firstOrCreate(['name' => 'regions.create']);
	    Permission::firstOrCreate(['name' => 'regions.edit']);
	    Permission::firstOrCreate(['name' => 'regions.delete']);
	    Permission::firstOrCreate(['name' => 'districts.list']);
	    Permission::firstOrCreate(['name' => 'districts.create']);
	    Permission::firstOrCreate(['name' => 'districts.delete']);
	    Permission::firstOrCreate(['name' => 'complaints.list']);
	    Permission::firstOrCreate(['name' => 'complaints.create']);
	    Permission::firstOrCreate(['name' => 'complaints.view']);
	    Permission::firstOrCreate(['name' => 'complaints.comment']);
	    Permission::firstOrCreate(['name' => 'complaints.reply']);
	    Permission::firstOrCreate(['name' => 'complaints.forward']);
	    Permission::firstOrCreate(['name' => 'divisions.list']);
	    Permission::firstOrCreate(['name' => 'divisions.create']);
	    Permission::firstOrCreate(['name' => 'divisions.edit']);
	    Permission::firstOrCreate(['name' => 'divisions.delete']);
	    Permission::firstOrCreate(['name' => 'units.list']);
	    Permission::firstOrCreate(['name' => 'units.create']);
	    Permission::firstOrCreate(['name' => 'units.edit']);
	    Permission::firstOrCreate(['name' => 'units.delete']);
	    Permission::firstOrCreate(['name' => 'activity_logs.list']);
	    Permission::firstOrCreate(['name' => 'activity_logs.clear']);

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
