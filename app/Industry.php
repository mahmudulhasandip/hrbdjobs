<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    public function companyIndustry(){
        return $this->belongsTo('App\Company_industry');
    }
    
}