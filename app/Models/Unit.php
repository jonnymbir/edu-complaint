<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Unit extends Model
{
    use HasFactory, LogsActivity;

	protected $table = 'units';

	protected $fillable = [
		'unit_name',
		'unit_email',
		'unit_contact_person',
		'unit_contact_person_telephone',
		'unit_cc'
	];

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'unit_name',
				'unit_email',
				'unit_contact_person',
				'unit_contact_person_telephone',
				'unit_cc'
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('Unit Activity Log')
			->dontSubmitEmptyLogs();
	}

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
