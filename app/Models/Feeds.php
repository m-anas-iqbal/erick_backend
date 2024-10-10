<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeds extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status', 'extra', 'video', 'description'];

    public function getVideoAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value); // or any custom path logic
        }
        return null;
    }
}
