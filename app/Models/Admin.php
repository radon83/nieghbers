<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    const GENDER = ['m', 'f'];
    const STATUS = ['active', 'inactive'];
    const AVATAR_COLORS = ['danger', 'success', 'secondary', 'primary'];

    public function getAdminGenderAttribute()
    {
        return $this->gender == 'm' ? __('Male') : __('Female');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
