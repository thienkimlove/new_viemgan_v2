<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'key_name',
        'key_type',
        'key_content',
        'key_value',
    ];
}
