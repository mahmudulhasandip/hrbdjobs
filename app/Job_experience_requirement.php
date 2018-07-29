<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_experience_requirement extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function job(){
        return $this->belongsTo('App\Job');
    }
}
