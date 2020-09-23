<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];

    public function report()
    {
    	return $this->hasOne(Report::class);
    }
}
