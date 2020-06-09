<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

    class Professor extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'professor';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];


        public function examen()
        {
            return $this->hasMany(Examen::class);
        }
}