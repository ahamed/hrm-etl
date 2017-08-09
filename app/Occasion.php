<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $fillable = ['events','start','end','days','fixed','type'];
}
