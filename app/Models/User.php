<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
	use HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'password_changed_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_changed_at' => 'datetime',
        'password' => 'hashed',
    ];

	// get full name
	public function getFullNameAttribute(): string
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly([
				'name',
				'first_name',
				'last_name',
				'email',
                'password_changed_at',
			])
			->logOnlyDirty()
			->setDescriptionForEvent(fn (string $eventName) =>  "This Record has been {$eventName} by user: " . auth()->user()?->name ?? 'Unknown')
			->useLogName('User Activity Log')
			->dontSubmitEmptyLogs();
	}

	public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Comment::class);
	}
}
