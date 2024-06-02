<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    private $fillable = ['post_id', 'user_id', 'comment'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
