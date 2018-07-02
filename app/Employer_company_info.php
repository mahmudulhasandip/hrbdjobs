<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer_company_info extends Model
{
    protected static function boot() {
        parent::boot();

        static::deleting(function($employer_company_info) { // before delete() method call this
            sizeof($employer_company_info->companyIndustry) ? $employer_company_info->companyIndustry()->delete():'';
            // do the rest of the cleanup...
        });
    }

    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function companyIndustry(){
        return $this->hasMany('App\Company_industry', 'employer_company_info_id', 'id');
    }

    public function companySocialMedia(){
        return $this->hasOne('App\Company_social_media', 'employer_company_info_id', 'id');
    }
}
