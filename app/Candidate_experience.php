<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_experience extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }

    public function jobDesignation(){
        return $this->hasOne('App\Job_designation', 'id', 'candidate_designation');
    }

}
