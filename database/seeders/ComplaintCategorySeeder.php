<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Safe Guarding',
			'safe-guarding',
			'Complaints about the safety or well-being of a child or vulnerable adult',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Ethical and Moral Concerns',
			'ethical-and-moral-concerns',
			'Complaints about the ethical or moral conduct of a member of staff',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Legal Concerns',
			'legal-concerns',
			'Complaints about the legal conduct of a member of staff',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Financial Concerns',
			'financial-concerns',
			'Complaints about the financial conduct of a member of staff',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Impact',
			'impact',
			'Complaints about the impact of a member of staff\'s conduct on the complainant',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Communication and Information',
			'communication-and-information',
			'Complaints about the communication and information provided by a member of staff',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Project and Service Quality',
			'project-and-service-quality',
			'Complaints about the quality of a project or service',
		]);
		DB::insert('INSERT INTO complaint_categories (name, slug, description) VALUES (?, ?, ?)', [
			'Health and Safety',
			'health-and-safety',
			'Complaints about the health and safety of a project or service',
		]);
    }
}
