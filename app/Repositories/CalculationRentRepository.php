<?php

namespace App\Repositories;

use App\Models\CalculationRent;
use App\Repositories\BaseRepository;

class CalculationRentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'car_id',
        'count_day',
        'total_cost'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CalculationRent::class;
    }
}
