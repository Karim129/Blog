<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    protected $casts = [
        'created_at' => 'datetime:d-m-Y h:i A',
        'updated_at' => 'datetime:d-m-Y h:i A',
    ];

    protected function asDateTime($value)
    {
        // Convert to the desired timezone (Africa/Cairo)
        return parent::asDateTime($value)->timezone('Africa/Cairo');
    }
}
