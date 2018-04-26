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
        return $this->hasMany('App\Candidate_training');
    }

    public function candidateSkill(){
        return $this->hasMany('App\Candidate_skill');
    }

    public function candidateResume(){
        return $this->hasOne('App\Candidate_resume');
    }

    public function candidateProfessionalCertificate(){
        return $this->hasMany('App\Candidate_professional_certificate');
    }

    public function candidateExperience(){
        return $this->hasMany('App\Candidate_experience');
    }

    public function candidateEducation(){
        return $this->hasMany('App\Candidate_education');
    }

    public function appliedJob(){
        return $this->hasMany('App\Applied_job');
    }

    public function candidateInvitation(){
        return $this->hasMany('App\Candidate_invitation');
    }
    
}
