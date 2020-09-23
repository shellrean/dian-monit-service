<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
        'updated_at' =>  'datetime:d/m/Y h:i:s A',
    ];

    public function school()
    {
    	return $this->belongsTo(School::class);
    }
}
