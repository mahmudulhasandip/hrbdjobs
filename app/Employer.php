<?php

namespace App;

use App\Notifications\EmployerResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($employer) { // before delete() method call this 
            sizeof($employer->employerPackages) ? $employer->employerPackages()->delete(): '';
            ($employer->employerCompanyInfo != null) ? $employer->employerCompanyInfo->delete(): '';
            sizeof($employer->shortListedResume) ? $employer->shortListedResume()->delete(): '';
            sizeof($employer->followEmployer) ? $employer->followEmployer()->delete(): '';
            sizeof($employer->candidateInvitation) ? $employer->candidateInvitation()->delete(): '';
            sizeof($employer->paymentHistory) ? $employer->paymentHistory()->delete(): '';
            sizeof($employer->job) ? $employer->job()->delete(): '';
            // do the rest of the cleanup...
        });
    }

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
