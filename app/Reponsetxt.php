<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponsetxt extends Model
{
    protected $guarded = [];

    public function examen_passer()
    {
    	return $this->belongsTo(Examen_passer::class);
    }
}
