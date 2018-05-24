<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_package extends Model
{

    protected $fillable = [
        'name',
        'price',
        'job_post',
        'duration',
    ];

    public function employerPackage(){
        return $this->belongsTo('App\Employer_package');
    }

    public function paymentHistory(){
        return $this->belongsTo('App\Payment_history');
    }
}
