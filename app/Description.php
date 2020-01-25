<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'desc'
    ];
    
    public $timestamps = false;
    
    public function sight()
    {
        return $this->belongsTo('App\Sight');
    }
}
