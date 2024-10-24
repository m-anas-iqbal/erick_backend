<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'social_security_number',
        'contact_number',
        'lines_of_authority',
        'years_of_experience',
        'previous_employers',
        'agency_company_name',
        'position_title',
        'employment_status',
    ];
}
