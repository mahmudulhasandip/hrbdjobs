<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other_benifit extends Model
{
    public function job(){
        return $this->belongsTo('App\Job');
    }
}
