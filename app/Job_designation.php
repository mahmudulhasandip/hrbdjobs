<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_designation extends Model
{
    protected $fillable = [
        'name',
    ];

    
    public function job(){
        return $this->belongsTo('App\Job');
    }

    public function candidateSkill(){
        return $this->belongsTo('App\Candidate_skill');
    }

    public function candidateExperience(){
        return $this->belongsTo('App\Candidate_experience');
    }
}
