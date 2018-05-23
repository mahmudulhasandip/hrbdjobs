<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer_package extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function featuredPackage(){
        return $this->hasMany('App\Featured_package', 'id', 'featured_package_id');
    }

    public function jobPackage(){
        return $this->hasMany('App\Job_package', 'id', 'job_package_id');
    }
}
