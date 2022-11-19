<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Filament\Models\Contracts\FilamentUser;
use MBarlow\Megaphone\HasMegaphone;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles,
        LogsActivity,
        HasMegaphone;
        
    public $pushNotificationType = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function canAccessFilament(): bool
    {
        return str_ends_with($this->email, '@ramydemos.com') && $this->hasVerifiedEmail();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email', 'status']);
    }
    public function routeNotificationForFcm()
    {
        return $this->fcm_token;
    }
}
