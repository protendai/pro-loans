<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_number',
        'user_id',
        'period',
        'amount_borrowed',
        'interest',
        'total_repayment',
        'date_application',
        'date_approval',
        'date_payment',
        'date_due',
        'loan_status',
    ];
}
