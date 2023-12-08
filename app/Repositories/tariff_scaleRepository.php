<?php

namespace App\Repositories;

use App\Models\tariff_scale;
use App\Repositories\BaseRepository;

class tariff_scaleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tariff_uid',
        'start_quantity',
        'end_quantity',
        'price',
        'service_price',
        'minimum_quantity',
        'id',
        'uid', 
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return tariff_scale::class;
    }
}
