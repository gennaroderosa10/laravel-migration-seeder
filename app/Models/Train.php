<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = [
        'company',
        'departure_station',
        'arrival_station',
        'departure_time',
        'arrival_time',
        'departure_date',
        'train_code',
        'total_carriages',
        'on_time',
        'cancelled',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'on_time'        => 'boolean',
        'cancelled'      => 'boolean',
    ];


    public function scopeFromToday($query)
    {
        return $query->where('departure_date', '>=', today());
    }
}
