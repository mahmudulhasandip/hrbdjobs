<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_education extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }
}
