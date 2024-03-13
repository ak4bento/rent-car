<?php

namespace App\Repositories;

use App\Models\Rent;
use App\Repositories\BaseRepository;

class RentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'car_id',
        'start_rent',
        'finish_rent'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Rent::class;
    }
}
