<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }
}
