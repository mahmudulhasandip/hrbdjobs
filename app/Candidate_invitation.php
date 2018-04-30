<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_invitation extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }

    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
