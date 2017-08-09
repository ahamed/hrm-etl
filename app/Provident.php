<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provident extends Model
{
    //

    protected $fillable = ['user_id','company','woner','flag'];

    public function employeeInfo(){
        return $this->belongsTo('App\Employee','user_id','user_id');
    }
}
