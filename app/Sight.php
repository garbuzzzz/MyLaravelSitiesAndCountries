<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public $timestamps = false;
    
    public function descriptions()
    {
        return $this->hasMany('App\Description');
    }
    
    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
