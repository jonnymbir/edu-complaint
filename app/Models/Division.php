<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Division extends Model
{
    use HasFactory;

	protected $table = 'divisions';

	protected $fillable = [
		'div_name',
		'div_email',
		'div_contact_person',
		'div_contact_person_telephone',
		'div_cc'
	];

	// get div_contact_person name from email if null or empty, on create
	public static function boot(): void
	{
		parent::boot();

		static::creating(function ($model) {
			if (empty($model->div_contact_person)) {
				$model->div_contact_person = Str::headline(Str::before($model->div_email, '@'));
//				explode('@', $model->div_email)[0]
			}
		});
	}
}
