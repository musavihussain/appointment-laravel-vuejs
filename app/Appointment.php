<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['spots_id', 'fullname', 'email', 'mobile', 'address', 'user_id'];

    protected static function boot() {
        parent::boot();
        static::creating(function($appointment) {
            $appointment->user_id = auth()->user()->id;
        });
    }


}
