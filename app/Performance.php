<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    //
    protected $fillable = [
        'user_id','month','year','wfp','communication','qw','honesty','creativity','honesty','attitute','cr','ts',
        'la','leave','comment'
    ];
}
