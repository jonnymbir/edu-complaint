<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    use HasFactory, LogsActivity;

	protected $fillable = [
		'complaint_id',
		'user_id',
		'parent_id',
		'comment',
		'attachment',
	];

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'complaint.ticket_number',
				'user.name',
				'parent.comment',
				'comment',
				'attachment',
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('Comment Activity Log')
			->dontSubmitEmptyLogs();
	}

	public function complaint(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Complaint::class);
	}

	public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(__CLASS__);
	}

	public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(__CLASS__, 'parent_id');
	}

	public function getCreatedAtAttribute($value): string
	{
			return date('d M Y H:i A', strtotime($value));
	}

//	public function getAttachmentAttribute($value): string
//	{
//		return $value ? asset('storage/' . $value) : '';
//	}
}
