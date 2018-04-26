<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applied_job extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }
}
