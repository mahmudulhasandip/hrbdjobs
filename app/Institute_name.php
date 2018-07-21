<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute_name extends Model
{
    protected $fillable = [
        'name'
    ];

    public function candidateEducation(){
        return $this->belongsTo('App\Candidate_education');
    }

}
