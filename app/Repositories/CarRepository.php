<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\BaseRepository;

class CarRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'type',
        'model',
        'plate_number',
        'rental_rate'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Car::class;
    }
}
