<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepayment extends Model
{
    use HasFactory;

    protected $fillable = [
       'loan_number',
        'monthly_payment',
        'total_amount',
        'total_paid',
        'balance',
        'date_first_payment',
        'date_next_payment',
    ];
}
