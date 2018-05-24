<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured_package extends Model
{
    protected $fillable = [
        'name',
        'price',
        'featured_type',
        'featured_amount',
        'duration',
    ];

    public function employerPackage(){
        return $this->belongsTo('App\Employer_package');
    }

    public function paymentHistory(){
        return $this->belongsTo('App\Payment_history');
    }
}
