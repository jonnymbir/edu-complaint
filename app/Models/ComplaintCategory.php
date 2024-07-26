<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ComplaintCategory extends Model
{
    use HasFactory, LogsActivity;

	protected $table = 'complaint_categories';

	protected $fillable = [
		'name',
		'slug',
		'description',
	];

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'name',
				'slug',
				'description',
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('Complaint Category Activity Log')
			->dontSubmitEmptyLogs();
	}

	// generate slug and if it exists, add a random string to it
	public static function boot(): void
	{
		parent::boot();

		static::creating(callback: function ($complaintCategory) {
			$slug = Str::slug($complaintCategory->name);
			$count = ComplaintCategory::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
			$complaintCategory->slug = $count ? "{$slug}-{$count}" : $slug;
		});
	}

	// public function complaints(): HasMany
	// {
	// 	return $this->hasMany(Complaint::class);
	// }

    /**
     * The complaints that belong to the ComplaintCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function complaints(): BelongsToMany
    {
        return $this->belongsToMany(Complaint::class, 'category_complaint', 'category_id', 'complaint_id');
    }
}
