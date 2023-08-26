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
	    Permission::firstOrCreate(['name' => 'dashboard']);
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
	    Permission::firstOrCreate(['name' => 'district.list']);
	    Permission::firstOrCreate(['name' => 'district.create']);
	    Permission::firstOrCreate(['name' => 'district.delete']);
	    Permission::firstOrCreate(['name' => 'complaint.create']);
	    Permission::firstOrCreate(['name' => 'complaint.view']);
	    Permission::firstOrCreate(['name' => 'complaint.comment']);
	    Permission::firstOrCreate(['name' => 'complaint.reply']);
	    Permission::firstOrCreate(['name' => 'complaint.forward']);
	    Permission::firstOrCreate(['name' => 'division.list']);
	    Permission::firstOrCreate(['name' => 'division.create']);
	    Permission::firstOrCreate(['name' => 'division.edit']);
	    Permission::firstOrCreate(['name' => 'division.delete']);
	    Permission::firstOrCreate(['name' => 'unit.list']);
	    Permission::firstOrCreate(['name' => 'unit.create']);
	    Permission::firstOrCreate(['name' => 'unit.edit']);
	    Permission::firstOrCreate(['name' => 'unit.delete']);
	    Permission::firstOrCreate(['name' => 'activity.list']);
	    Permission::firstOrCreate(['name' => 'activity.clear']);

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
