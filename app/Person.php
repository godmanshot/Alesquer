<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    public $fillable = ['first_name', 'last_name', 'identity', 'contacts', 'date_birth', 'adress'];
}
