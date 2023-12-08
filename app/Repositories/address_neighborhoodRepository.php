<?php

namespace App\Repositories;

use App\Models\address_neighborhood;
use App\Repositories\BaseRepository;

class address_neighborhoodRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'district_uid',
        'name',
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
        return address_neighborhood::class;
    }
}
