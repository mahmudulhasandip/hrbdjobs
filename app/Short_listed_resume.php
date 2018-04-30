<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Short_listed_resume extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }

    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
