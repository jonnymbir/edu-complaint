<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class District extends Model
{
    use HasFactory, LogsActivity;

	protected $table = 'districts';

	protected $fillable = [
		'region_id',
		'name',
		'code',
        'town_locality',
	];

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'name',
				'code',
				'region.name',
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('District Activity Log')
			->dontSubmitEmptyLogs();
	}

	public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Region::class);
	}

	public function complaints(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Complaint::class);
	}
}
