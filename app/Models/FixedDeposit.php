<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_id',
        'bank_name',
        'fd_number',
        'interest_rate',
        'start_date',
        'maturity_date',
        'interest_type',
        'compounding_frequency',
        'is_tax_saver',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
