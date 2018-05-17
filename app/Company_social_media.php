<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_social_media extends Model
{
    //
    public function employerCompanyInfo(){
        return $this->belongsTo('App\Employer_company_info');
    }
}
