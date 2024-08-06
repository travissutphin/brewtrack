<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'store_name',
        'store_address',
        'store_city',
        'store_state',
        'store_zip',
        'store_longitude',
        'store_latitude',
    ];
	
	public function reports()
	{
		return $this->hasMany(Report::class);
	}

}