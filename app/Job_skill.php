<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_skill extends Model
{
    public function job(){
        return $this->belongsTo('App\Job');
    }

    public function skill(){
        return $this->belongsTo('App\Skill');
    }
}
