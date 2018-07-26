<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model {

    protected $table = 'registers';
	protected $fillable = ['name', 'email', 'phone', 'address', 'province', 'dob', 'ssn'];

}
