<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $guarded = [];

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
