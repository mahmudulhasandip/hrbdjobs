<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountryController extends Controller
{
    //
    public function getCountries(){

    }

    public function storeCountryFromAPI(){
    	$url = 'https://restcountries.eu/rest/v2/all';
    	$countries = json_decode(file_get_contents($url), 1);

    	foreach ($countries as $country) {
    		$dbCountry = new Country();
    		$dbCountry->name = $country['name'];
    		$dbCountry->save();
    	}

    }
}
