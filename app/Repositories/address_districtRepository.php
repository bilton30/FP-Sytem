<?php

namespace App\Repositories;

use App\Models\address_district;
use App\Repositories\BaseRepository;

class address_districtRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'province_uid',
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
        return address_district::class;
    }
}
