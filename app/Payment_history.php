<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_history extends Model
{
    public function employer(){
        return $this->belongsTo('App\Employer');
    }
}
