<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_post extends Model
{
    
    protected $fillable = [
        'user_id', 'title', 'content', 'type', 'catalog', 'iframe_syntax', 'image_thumb', 'is_publish', 'created_at', 'updated_at'
    ];
}
