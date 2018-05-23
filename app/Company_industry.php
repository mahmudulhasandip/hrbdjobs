<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_industry extends Model
{
    public function employerCompanyInfo(){
        return $this->belongsTo('App\Employer_company_info');
    }

    public function industry(){
        return $this->hasOne('App\Industry', 'id', 'industry_id' );
    }
}
