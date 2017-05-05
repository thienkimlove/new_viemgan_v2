<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{

    protected $fillable = ['city', 'content', 'area', 'seo_title', 'keywords', 'desc'];

    public $timestamps = false;
}
