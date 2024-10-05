<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qoutation extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'date_of_birth',
        'gender',
        'occupation',
        'work_address',
        'work_email',
        'insurance_type',
        'coverage_amount',
        'premium_payment',
    ];
}
