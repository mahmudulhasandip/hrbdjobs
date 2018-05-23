<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function jobCategory(){
        return $this->hasOne('App\Job_category', 'id', 'job_category_id');
    }

    public function jobDesignation(){
        return $this->hasOne('App\Job_designation', 'id', 'job_designation_id');
    }

    public function jobLevel(){
        return $this->hasOne('App\Job_level', 'id', 'job_level_id');
    }

    public function jobExperience(){
        return $this->hasOne('App\Job_experience', 'id', 'experience_id');
    }

    public function salary(){
        return $this->hasOne('App\Salary', 'id', 'salary_range');
    }

    public function jobSkill(){
        return $this->hasMany('App\Job_skill', 'job_id', 'id');
    }

    public function favouriteJob(){
        return $this->hasMany('App\Favourite_job', 'job_id', 'id');
    }

    public function candidateInvitation(){
        return $this->hasMany('App\Candidate_invitation', 'job_id', 'id');
    }

    public function appliedJob(){
        return $this->hasMany('App\Applied_job', 'job_id', 'id');
    }

    public function shortListedResume(){
        return $this->hasMany('App\Short_listed_resume', 'job_id', 'id');
    }
}
