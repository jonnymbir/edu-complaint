<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ComplaintCategory extends Model
{
    use HasFactory;

	protected $table = 'complaint_categories';

	protected $fillable = [
		'name',
		'slug',
		'description',
	];

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

	public function complaints(): HasMany
	{
		return $this->hasMany(Complaint::class);
	}
}
