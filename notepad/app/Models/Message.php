<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content', 'pos_x', 'pos_y', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

