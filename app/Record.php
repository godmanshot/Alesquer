<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
	public $fillable = ['person_id', 'record_text', 'date'];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
