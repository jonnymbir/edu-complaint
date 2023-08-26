<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

	protected $table = 'regions';

	protected $fillable = [
		'name',
		'code',
	];

	public function districts(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(District::class);
	}

	public function complaints(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Complaint::class);
	}
}
