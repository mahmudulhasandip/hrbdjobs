<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    protected $fillable = [
        'name',
    ];
    
    public function jobSkill(){
    	// return $this->belongsTo('App\Job_skill');
        return $this->hasOne('App\Job_skill', 'skill_id', 'id');
    }

    public function candidateSkill(){
        return $this->belongsTo('App\Candidate_skill');
    }
}
