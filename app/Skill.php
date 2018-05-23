<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function jobSkill(){
        return $this->hasOne('App\Job_skill', 'skill', 'id');
    }

    public function candidateSkill(){
        return $this->belongsTo('App\Candidate_skill');
    }
}
