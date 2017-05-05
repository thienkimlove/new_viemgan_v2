<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'address',
        'note',
        'product_id',
        'quantity',
        'phone',
        'status'
    ];

    public function product()
    {
        return $this->hasOne(Post::class, 'id', 'product_id');
    }
}
