<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
