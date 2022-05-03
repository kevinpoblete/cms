<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
