<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'subject',
        'content',
    ];
}
