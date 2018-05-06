<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Searchable extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function searchable(){
        return $this->morphTo();
    }
}
