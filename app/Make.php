<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $guarded = [];

    public $timestamps = false;
    
    public function models(){
        return $this->hasMany(Models::class);
    } 
    
}