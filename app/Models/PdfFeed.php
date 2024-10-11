<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfFeed extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status', 'extra', 'pdf', 'description'];

    public function getPdfAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value); // or any custom path logic
        }
        return null;
    }
}
