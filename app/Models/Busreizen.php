<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busreizen extends Model
{
    protected $table = 'busreizen';

    /** @use HasFactory<\Database\Factories\BusreizenFactory> */
    use HasFactory;
    protected $fillable = [
        'departure',
        'arrival',
        'departure_date',
        'arrival_date',
        'departure_time',
        'arrival_time',
        'festival_id',
    ];
    public function festival()
    {
        return $this->belongsTo(Festival::class, 'festival_id');
    }
}
