<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

	protected $table = 'districts';

	protected $fillable = [
		'name',
		'code',
		'region_id',
	];

	public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
	{
		return $this->belongsTo(Region::class);
	}

	public function complaints(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Complaint::class);
	}
}
