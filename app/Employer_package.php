<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer_package extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
