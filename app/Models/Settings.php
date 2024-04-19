<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    const POSITION = ['user', 'admin'];
    const LANGs = ['en' => 'English', 'ar' => 'Arabic'];
    const LANGs_FLAGs = [0 => 'us', 1 => 'sa'];
    const THEMEs = ['normal' => 'normal', 'dark' => 'dark'];

    protected $fillable = [
        'lang', 'theme', 'last_login', 'position', 'object_id'
    ];
}
