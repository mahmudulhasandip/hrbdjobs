<?php

namespace App;

use App\Notifications\EmployerResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
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
        $this->notify(new EmployerResetPassword($token));
    }

    public function employerPackages(){
        return $this->hasMany('App\Employer_package');
    }

    public function employerCompanyInfo(){
        return $this->hasOne('App\Employer_company_info');
    }

    public function shortListedResume(){
        return $this->hasMany('App\Short_listed_resume');
    }

    public function followEmployer(){
        return $this->hasMany('App\Follow_employer');
    }

    public function candidateInvitation(){
        return $this->hasMany('App\Candidate_invitation');
    }

    public function job(){
        return $this->hasMany('App\Job');
    }

    public function paymentHistory(){
        return $this->hasMany('App\Payment_history');
    }
}
