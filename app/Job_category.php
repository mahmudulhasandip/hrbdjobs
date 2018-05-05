<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_category extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function job(){
        return $this->belongsTo('App\Job');
    }

    public function candidateSkill(){
        return $this->belongsTo('App\Candidate_skill');
    }
    
}
