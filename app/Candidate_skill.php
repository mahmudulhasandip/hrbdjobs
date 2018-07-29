<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_skill extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }

    public function skill(){
        return $this->hasOne('App\Skill', 'id', 'expertise_area');
    }

    public function jobCategory(){
        return $this->hasOne('App\Job_category', 'id', 'category_id');
    }

    public function jobLevel(){
        return $this->hasOne('App\Job_level', 'id', 'job_level');
    }

    public function jobStatus(){
        return $this->hasOne('App\Job_status', 'id', 'job_level');
    }

    public function jobDesignation(){
        return $this->hasOne('App\Job_designation', 'id', 'designation_id');
    }
}
