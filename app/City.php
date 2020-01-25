<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public $timestamps = false;
    
    
    public function sights()
    {
        return $this->hasMany('App\Sight');
    }
    
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
