<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_experience extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function job(){
        return $this->belongsTo('App\Job');
    }
}
