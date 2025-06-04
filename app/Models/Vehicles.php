<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = [
        'vehicle_code',
        'brand',
        'name',
        'plate_number',
        'year',
        'status',
        'seats',
        'luggage',
        'insurance',
        'price'
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class, 'vehicle_id');
    }
}
