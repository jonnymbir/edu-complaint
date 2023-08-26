<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;

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

	public function complaintCategory(): BelongsTo
	{
		return $this->belongsTo(ComplaintCategory::class);
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
