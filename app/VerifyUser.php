<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    //
    protected $guarded = [];
 
    public function employer()
    {
        return $this->belongsTo('App\Employer', 'user_id');
    }
}
