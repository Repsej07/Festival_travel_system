<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'date',
        'description',
        'image',
        'price',
        'tickets',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_trips', 'festival_id', 'user_id')
            ->withTimestamps();
    }
}
