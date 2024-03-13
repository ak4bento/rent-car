<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public $table = 'rents';

    public $fillable = [
        'user_id',
        'car_id',
        'start_rent',
        'finish_rent'
    ];

    protected $casts = [
        'start_rent' => 'date',
        'finish_rent' => 'date'
    ];

    public static array $rules = [
        'user_id' => 'nullable',
        'car_id' => 'required',
        'start_rent' => 'required',
        'finish_rent' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function car(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Car::class, 'car_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function countRentDays()
    {
        $startRent = Carbon::parse($this->start_rent);
        $finishRent = Carbon::parse($this->finish_rent);

        return $startRent->diffInDays($finishRent);
    }
}
