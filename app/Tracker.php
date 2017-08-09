<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
     protected $fillable = ['user_id','entry_date','entry_time'];
}
