<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiUser extends Model
{
    public $table = 'informasi_users';

    public $fillable = [
        'user_id',
        'address',
        'telephone',
        'SIM'
    ];

    protected $casts = [
        'address' => 'string',
        'telephone' => 'string',
        'SIM' => 'string'
    ];

    public static array $rules = [
        'user_id' => 'nullable',
        'address' => 'required|string|max:65535',
        'telephone' => 'required|string|max:255',
        'SIM' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
