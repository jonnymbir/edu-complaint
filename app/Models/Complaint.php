<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Complaint extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

	protected $table = 'complaints';

	protected $fillable = [
		'complaint_category_id',
		'ticket_number',
		'first_name',
		'middle_name',
		'last_name',
		'email_address',
		'telephone',
		'sex',
		'age_range',
		'region_id',
		'district_id',
		'stakeholder_type',
		'concern',
		'details',
		'response',
		'is_forwarded',
		'times_forwarded',
		'attachments',
		'response_channel',
		'is_anonymous',
		'status',
	];

	protected $casts = [
		'attachments' => 'array',
		'is_anonymous' => 'boolean',
	];

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'complaint_category_id',
				'ticket_number',
				'first_name',
				'middle_name',
				'last_name',
				'email_address',
				'telephone',
				'sex',
				'age_range',
				'region.name',
				'district.name',
				'stakeholder_type',
				'concern',
				'details',
				'response',
				'is_forwarded',
				'times_forwarded',
				'attachments',
				'response_channel',
				'is_anonymous',
				'status',
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('Complaint Activity Log')
			->dontSubmitEmptyLogs();
	}

	// generate ticket number
	public static function boot(): void
	{
		parent::boot();

		static::creating(callback: function ($complaint) {
			$complaint->ticket_number = 'CID' . random_int(1, 999) . $complaint->count() + 1;
		});
	}

	public function getFullNameAttribute(): string
	{
		return "{$this->first_name} {$this->middle_name} {$this->last_name}";
	}

	//	getter for the sex in capital letters
	public function getSexAttribute($value): string
	{
		return Str::headline($value);
	}

	//	getter for the sex in capital letters
	public function getStakeholderTypeAttribute($value): string
	{
		return Str::headline($value);
	}

	//	getter for the sex in capital letters
	public function getConcernAttribute($value): string
	{
		return Str::headline($value);
	}

	//	getter for the sex in capital letters
	public function getResponseChannelAttribute($value): string
	{
		return Str::headline($value);
	}

	// public function complaintCategory(): BelongsTo
	// {
	// 	return $this->belongsTo(ComplaintCategory::class);
	// }

    /**
     * The categories that belong to the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ComplaintCategory::class, 'category_complaint', 'complaint_id', 'category_id');
    }

	public function region(): BelongsTo
	{
		return $this->belongsTo(Region::class);
	}

	public function district(): BelongsTo
	{
		return $this->belongsTo(District::class);
	}

	public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Comment::class);
	}
}
