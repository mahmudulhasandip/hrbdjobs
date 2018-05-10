<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer_company_info extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function companyIndustry(){
        return $this->hasMany('App\Company_industry');
    }
}
