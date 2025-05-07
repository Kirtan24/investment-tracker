<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'investment_date',
        'amount_invested',
        'notes',
    ];

    public function fixedDeposit()
    {
        return $this->hasOne(FixedDeposit::class);
    }

    public function property()
    {
        return $this->hasOne(Property::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
