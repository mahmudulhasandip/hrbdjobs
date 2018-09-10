<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_package_item extends Model
{
    public function servicePackage(){
        return $this->belongsTo('App\Service_package');
    }
}
