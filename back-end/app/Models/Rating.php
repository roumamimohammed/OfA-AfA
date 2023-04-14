<?php

namespace App\Models;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    protected $fillable = ['user_id', 'post_id', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(post::class);
    }
}
