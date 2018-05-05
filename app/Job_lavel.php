<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_lavel extends Model
{
    public function job(){
        return $this->belongsTo('App\Job');
    }
}
