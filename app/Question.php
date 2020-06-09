<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function examen()
    {
    	return $this->belongsTo(Examen::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }
}
