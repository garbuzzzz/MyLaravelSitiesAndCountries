<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Sight;

class AdminController extends Controller
{
    public function countries(Request $request)
    {
        $countries = Country::all();
        if($request->has('edit'))
        {
            $id = $request->id;
            $elems = $countries;
            $url = route('admin_countries');
            $title = 'Редактирование страны';
            return view('edit_form', ['elems' => $elems, 'url' => $url, 'title' => $title, 'id' => $id]);
        }
    
        if($request->has('edit_name') and $request->has('id'))
        {
            if($request->edit_name == null) {
                return redirect()->back()->with(['status' => 'Поле не может быть пустым!']);
            }
            $id = $request->id;
            $country = Country::find($request->id);
            $country->name = $request->edit_name;
            $country->save();
            return redirect()->route('admin_countries')->with(['status' => 'Успешно изменено!']);
        }
        
        if ($request->has('add_name')) {
            $country = new Country;
            $country->name = $request->add_name;
            $country->save();
            return redirect()->back()->with('status', 'Страна сохранена в БД');
        }
    
        if($request->has('delete'))
        {
            $country = Country::find($request->delete);
            $country->delete();
            return redirect()->back()->with('status', 'Страна удалена из БД');
        }
        
        $elems = $countries;
        $url = route('admin_countries');
        $title = 'Страны';
        return view('admin_table', ['elems' => $elems, 'url' => $url, 'title' => $title]);
    }
    
    public function cities($country_name, Request $request)
    {
        $country = Country::where('name', $country_name)->first();
        $country_id = $country->id;
        $cities = $country->cities;
        
        if($request->has('edit'))
        {
            $id = $request->id;
            $elems = $cities;
            $url = route('admin_country', ['country' => $country_name]);
            $title = 'Редактирование города';
            return view('edit_form', ['elems' => $elems, 'url' => $url, 'title' => $title, 'id' => $id]);
        }
        
        if($request->has('edit_name') and $request->has('id'))
        {
            if($request->edit_name == null) {
                return redirect()->back()->with(['status' => 'Поле не может быть пустым!']);
            }
            $id = $request->id;
            $city = City::find($request->id);
            $city->name = $request->edit_name;
            $city->save();
            return redirect()->route('admin_country', ['country' => $country_name])->with(['status' => 'Успешно изменено!']);
        }
    
        if ($request->has('add_name')) {
            $city = new City;
            $city->name = $request->add_name;
            $city->country_id = $country_id;
            $city->save();
            return redirect()->back()->with('status', 'Город сохранён в БД');
        }
    
        if($request->has('delete'))
        {
            $city = City::find($request->delete);
            $city->delete();
            return redirect()->back()->with('status', 'Город удален из БД');
        }
        
        $elems = $cities;
        $url = route('admin_country', [$country_name]);
        $title = 'Города';
        return view('admin_table', ['elems' => $elems, 'url' => $url, 'title' => $title]);
    }
    
    public function sights($country_name, $city_name, Request $request)
    {
        $city = City::where('name', $city_name)->first();
        $city_id = $city->id;
        $sights = $city->sights;
    
        if($request->has('edit'))
        {
            $id = $request->id;
            $elems = $sights;
            $url = route('admin_city', ['country' => $country_name, 'city' => $city_name]);
            $title = 'Редактирование достопримечательности';
            return view('edit_form', ['elems' => $elems, 'url' => $url, 'title' => $title, 'id' => $id]);
        }
    
        if($request->has('edit_name') and $request->has('id'))
        {
            if($request->edit_name == null) {
                return redirect()->back()->with(['status' => 'Поле не может быть пустым!']);
            }
            $id = $request->id;
            $sight = Sight::find($request->id);
            $sight->name = $request->edit_name;
            $sight->save();
            return redirect()->route('admin_city', ['country' => $country_name, 'city' => $city_name])->with(['status' => 'Успешно изменено!']);
        }
    
        if ($request->has('add_name')) {
            $sight = new Sight;
            $sight->name = $request->add_name;
            $sight->city_id = $city_id;
            $sight->save();
            return redirect()->back()->with('status', 'Достопримечательность сохранена в БД');
        }
    
        if($request->has('delete'))
        {
            $sight = Sight::find($request->delete);
            $sight->delete();
            return redirect()->back()->with('status', 'Достопримечательность удалена из БД');
        }
        
        $elems = $sights;
        $url = route('admin_city', [$country_name, $city_name]);
        $title = 'Достопримечательности';
        return view('admin_table', ['elems' => $elems, 'url' => $url, 'title' => $title]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function descriptions($country_name, $city_name, $sight_name, Request $request)
    {
        $sight = Sight::where('name', $sight_name)->first();
        $descriptions = $sight->descriptions;
        
        if($request->has('edit'))
        {
            $id = $request->id;
            $title = 'Редактирование описания';
            return view('edit_form_end', ['title' => $title, 'id' => $id, 'descriptions' => $descriptions]);
        }
    
        if($request->has('edit_name') and $request->has('id'))
        {
            if($request->edit_name == null) {
                return redirect()->back()->with(['status' => 'Поле не может быть пустым!']);
            }
            $id = $request->id;
            $sight = Sight::find($request->id);
            $sight->name = $request->edit_name;
            $sight->save();
            return redirect()->route('admin_city', ['country' => $country_name, 'city' => $city_name])->with(['status' => 'Успешно изменено!']);
        }
    
        if ($request->has('add_name')) {
            $sight = new Sight;
            $sight->name = $request->add_name;
            $sight->city_id = $city_id;
            $sight->save();
            return redirect()->back()->with('status', 'Страна сохранена в БД');
        }
    
        if($request->has('delete'))
        {
            $sight = Sight::find($request->delete);
            $sight->delete();
            return redirect()->back()->with('status', 'Страна удалена из БД');
        }
        
        
        
        
        
        
        
        
        
        return view('end_table', ['descriptions' => $descriptions]);
    }
}
