<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_id',
        'ticker_symbol',
        'exchange',
        'purchase_date',
        'quantity',
        'purchase_price_per_unit',
        'broker_name',
        'sector',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
