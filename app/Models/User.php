<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS = ['active', 'inactive'];
    const GENDER = ['m', 'f'];
    const AVATAR_COLORS = ['danger', 'success', 'secondary', 'primary'];

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

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'user_id', 'id');
    }

    public function appliedItems()
    {
        return $this->hasMany(ApplyItems::class, 'user_id', 'id');
    }

    public function ownAppliedItems()
    {
        return $this->hasMany(ApplyItems::class, 'owner_id', 'id');
    }

    public function location()
    {
        return $this->hasOne(UserLocation::class, 'user_id', 'id');
    }
}
