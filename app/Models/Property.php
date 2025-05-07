<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_id',
        'property_type',
        'location',
        'purchase_date',
        'purchase_price',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
