<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;

	protected $table = 'units';

	protected $fillable = [
		'unit_name',
		'unit_email',
		'unit_contact_person',
		'unit_contact_person_telephone',
		'unit_cc'
	];

	// get unit_contact_person name from email if null or empty, on create
	public static function boot(): void
	{
		parent::boot();

		static::creating(function ($model) {
			if (empty($model->unit_contact_person)) {
				$model->unit_contact_person = Str::headline(Str::before($model->unit_email, '@'));
//				explode('@', $model->unit_email)[0]
			}
		});
	}
}
