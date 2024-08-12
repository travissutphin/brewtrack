<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'store_id',
        'notes_manager',
		'shelf_position',
        'facing',
        'stock_level',
        'out_of_stock',
        'price_accuracy',
		'status',
		'check_in',
		'check_out',
        'user_id',
    ];

	protected $casts = [
		'check_in' => 'datetime',
		'check_out' => 'datetime',
	];

			
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
}