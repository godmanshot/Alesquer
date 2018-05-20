<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $fillable = ['teacher_id', 'course_id', 'person_id'];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
}
