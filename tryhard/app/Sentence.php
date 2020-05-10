<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $fillable = [
        'text', 'type_id', 'tag', 'level_id', 'created_at', 'updated_at'
    ];
}
