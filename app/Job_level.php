<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_level extends Model
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
}
