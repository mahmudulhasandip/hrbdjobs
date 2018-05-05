<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function jobCategory(){
        return $this->hasOne('App\Job_category');
    }

    public function jobDesignation(){
        return $this->hasOne('App\Job_designation');
    }

    public function jobLevel(){
        return $this->hasOne('App\Job_level');
    }

    public function jobExperience(){
        return $this->hasOne('App\Job_experience');
    }

    public function salary(){
        return $this->hasOne('App\Salary');
    }

    public function jobSkill(){
        return $this->hasMany('App\Job_skill');
    }

    public function favouriteJob(){
        return $this->hasMany('App\Favourite_job');
    }

    public function candidateInvitation(){
        return $this->hasMany('App\Candidate_invitation');
    }

    public function appliedJob(){
        return $this->hasMany('App\Applied_job');
    }

    public function shortListedResume(){
        return $this->hasMany('App\Short_listed_resume');
    }
}
