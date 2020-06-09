<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen_passer extends Model
{
    protected $guarded = [];

    public function examen()
    {
    	return $this->belongsTo(Examen::class);
    }

    public function reponses()
    {
    	return $this->hasMany(Reponse::class);
    }

      public function reponsestxt()
    {
    	return $this->hasMany(Reponsetxt::class);
    }
}
