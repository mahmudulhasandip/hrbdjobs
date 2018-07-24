<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_education extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }

    public function candidateInstitute(){
        return $this->hasOne('App\Institute_name', 'id', 'institute_name_id');
    }
}
