<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];

    public function page(){
        return $this->belongsTo(Page::class);
    }

    public function contents(){
        return $this->hasMany(Content::class);
    }

    public function uploads(){
        return $this->hasMany(Upload::class);
    }
}
