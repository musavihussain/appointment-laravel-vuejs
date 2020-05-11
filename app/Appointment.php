<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['spots_id', 'fullname', 'email', 'mobile', 'address', 'user_id'];

}
