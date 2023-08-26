<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
		$this->call([
			PermissionSeeder::class,
			RegionDistrictSeeder::class,
			ComplaintCategorySeeder::class,
		]);

         \App\Models\User::factory(4)->create();
         \App\Models\Complaint::factory(4)->create();
         \App\Models\Comment::factory(20)->create();
//         \App\Models\ComplaintCategory::factory(8)->create();
         \App\Models\Division::factory(5)->create();
         \App\Models\Unit::factory(5)->create();

		 // truncate activity log table
         DB::table('activity_log')->truncate();
    }
}
