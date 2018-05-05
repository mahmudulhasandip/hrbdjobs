<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_skill extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }

    public function skill(){
        return $this->hasMany('App\Skill');
    }

    public function jobCategory(){
        return $this->hasMany('App\Job_category');
    }

    public function jobDesignation(){
        return $this->hasMany('App\Job_designation');
    }
}
