<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_package extends Model
{
    public function servicePackageItem(){
        return $this->hasOne('App\Service_package_item');
    }
}
