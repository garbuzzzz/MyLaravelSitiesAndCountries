<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Sight;


class TestController extends Controller
{
    public function countries()
    {
        $countries = Country::all();
        $title = 'Страны';
        return view('countries', ['countries' => $countries, 'title' => $title]);
    }
    
    public function cities($country_name)
    {
        $country = Country::where('name', $country_name)->first();
        $cities = $country->cities;
        $url = route('country', [$country_name]);
        $title = 'Города';
        return view('cities', ['cities' => $cities, 'url' => $url, 'title' => $title]);
    }
    
    public function sights($country_name, $city_name)
    {
        $city = City::where('name', $city_name)->first();
        $sights = $city->sights;
        $title = 'Достопримечательности';
        $url = route('city', [$country_name, $city_name]);
        return view('sights', ['sights' => $sights, 'url' => $url, 'title' => $title]);
    }
    
    public function descriptions($country_name, $city_name, $sight_name)
    {
        $sight = Sight::where('name', $sight_name)->first();
        $descriptions = $sight->descriptions;
        $title = 'Описания';
        //$url = route('city', [$country_name, $city_name, $sight_name]);
        return view('descriptions', ['descriptions' => $descriptions, 'title' => $title]);
    }
}








