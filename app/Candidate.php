<?php

namespace App;

use App\Notifications\CandidateResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CandidateResetPassword($token));
    }

    public function candidateTraining(){
        return $this->hasMany('App\Candidate_training', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function candidateSkill(){
        return $this->hasMany('App\Candidate_skill', 'candidate_id', 'id');
    }

    public function candidateResume(){
        return $this->hasOne('App\Candidate_resume', 'candidate_id', 'id');
    }

    public function candidateProfessionalCertificate(){
        return $this->hasMany('App\Candidate_professional_certificate', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function candidateExperience(){
        return $this->hasMany('App\Candidate_experience', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function candidateEducation(){
        return $this->hasMany('App\Candidate_education', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function appliedJob(){
        return $this->hasMany('App\Applied_job', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function candidateInvitation(){
        return $this->hasMany('App\Candidate_invitation', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function shortListedResume(){
        return $this->hasMany('App\Short_listed_resume', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function followEmployer(){
        return $this->hasMany('App\Follow_employer', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function favouriteJob(){
        return $this->hasMany('App\Favourite_job', 'candidate_id', 'id')->orderBy('id','desc');
    }

    public function verifyCandidate(){
        return $this->hasOne('App\VerifyCandidate', 'user_id', 'id');
    }
}
