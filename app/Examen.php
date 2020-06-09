<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $guarded = [];


    public function professor()
    {
    	return $this->belongsTo(Professor::class,'prof_id');
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function examen_passers()
    {
    	return $this->hasMany(Examen_passer::class);
    }
}
