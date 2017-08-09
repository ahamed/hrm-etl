<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = "applications";
    public function userName(){
    	return $this->belongsTo('App\User','sender_id','id');
    	// here second perameter is the local key and third one is foreign key.
    }
}
