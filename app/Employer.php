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
        return $this->hasMany('App\Employer_package', 'employer_id', 'id');
    }

    public function employerCompanyInfo(){
        return $this->hasOne('App\Employer_company_info', 'employer_id', 'id');
    }

    public function shortListedResume(){
        return $this->hasMany('App\Short_listed_resume', 'employer_id', 'id');
    }

    public function followEmployer(){
        return $this->hasMany('App\Follow_employer', 'employer_id', 'id');
    }

    public function candidateInvitation(){
        return $this->hasMany('App\Candidate_invitation', 'employer_id', 'id');
    }

    public function job(){
        return $this->hasMany('App\Job', 'employer_id', 'id');
    }

    public function paymentHistory(){
        return $this->hasMany('App\Payment_history', 'employer_id', 'id');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser', 'user_id', 'id');
    }
}
