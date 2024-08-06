<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'store_id',
        'sku',
        'name',
        'shelf_position',
        'facing',
        'stock_level',
        'out_of_stock',
        'price_accuracy',
        'user_id',
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