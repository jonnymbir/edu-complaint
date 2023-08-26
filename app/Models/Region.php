<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Region extends Model
{
    use HasFactory, LogsActivity;

	protected $table = 'regions';

	protected $fillable = [
		'name',
		'code',
	];

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'name',
				'code',
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('Region Activity Log')
			->dontSubmitEmptyLogs();
	}

	public function districts(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(District::class);
	}

	public function complaints(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Complaint::class);
	}
}
