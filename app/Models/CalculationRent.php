<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalculationRent extends Model
{
    public $table = 'calculation_rents';

    public $fillable = [
        'car_id',
        'count_day',
        'total_cost'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'car_id' => 'required',
        'count_day' => 'required',
        'total_cost' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function car(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Car::class, 'car_id');
    }
}
