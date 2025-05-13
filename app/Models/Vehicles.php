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
        'status'
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class, 'vehicle_id');
    }
}
