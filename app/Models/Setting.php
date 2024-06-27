<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['settings'];

    protected $casts = [
        'settings' => 'array',
    ];

    // public function getSettingsAttribute($value)
    // {
    //     return json_decode($value, true);
    // }
}
