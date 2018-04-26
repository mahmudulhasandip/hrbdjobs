<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_professional_certificate extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }
}
