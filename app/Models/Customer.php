<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'national_id',
        'phone',
        'province',
        'district',
        'address',
        'copy_national_id',
        'copy_residence',
        'copy_bank',
        'status'
    ];
}
