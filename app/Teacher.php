<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $fillable = ['first_name', 'last_name', 'contacts', 'category', 'car', 'work_time'];
}
