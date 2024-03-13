<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $table = 'cars';

    public $fillable = [
        'type',
        'model',
        'plate_number',
        'rental_rate'
    ];

    protected $casts = [
        'type' => 'string',
        'model' => 'string',
        'plate_number' => 'string'
    ];

    public static array $rules = [
        'type' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'plate_number' => 'required|string|max:255',
        'rental_rate' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function calculationRents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\CalculationRent::class, 'car_id');
    }

    public function rents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Rent::class, 'car_id');
    }

    public function isAvailableForRent()
    {
        $now = Carbon::now();
        
        $rents = $this->rents()->where('start_rent', '<=', $now)
                               ->where('finish_rent', '>=', $now)
                               ->count();

        return $rents === 0;
    }
}
