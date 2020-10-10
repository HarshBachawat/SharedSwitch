<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switchstate extends Model
{
    protected $table='switchstates';
    protected $fillable = ['user_id','state'];
}
