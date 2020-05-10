<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_word extends Model
{
    protected $fillable = [
        'encrypt_id', 'user_id', 'post_id', 'word_content', 'word_description', 'created_at', 'updated_at',
    ];
}
