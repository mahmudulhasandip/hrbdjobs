<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyCandidate extends Model
{
    //
    protected $guarded = [];

    public function candidate()
    {
        return $this->belongsTo('App\Candidate', 'user_id');
    }
}
