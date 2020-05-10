<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'encrypt_id', 'user_id', 'title', 'content', 'type', 'catalog', 'iframe_syntax', 'image_thumb', 'is_publish', 'created_at', 'updated_at'
    ];
}
