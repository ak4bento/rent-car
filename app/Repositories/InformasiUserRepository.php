<?php

namespace App\Repositories;

use App\Models\InformasiUser;
use App\Repositories\BaseRepository;

class InformasiUserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'address',
        'telephone',
        'SIM'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return InformasiUser::class;
    }
}
