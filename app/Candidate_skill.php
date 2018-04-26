<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_skill extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }
}
