<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer_company_info extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
