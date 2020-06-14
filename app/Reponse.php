<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $guarded = [];

    public function examen_passer()
    {
    	return $this->belongsTo(Examen_passer::class);
    }

 public function answer()
    {
    	return $this->hasOne(Answer::class,'id','answer_id');
    }

}
