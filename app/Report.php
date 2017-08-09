<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        "user_id","year","month","content","referTo"
    ];

    public function employeeInfo(){
        return $this->belongsTo('App\Employee','user_id','user_id');
    }
}
