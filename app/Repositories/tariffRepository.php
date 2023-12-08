<?php

namespace App\Repositories;

use App\Models\tariff;
use App\Repositories\BaseRepository;

class tariffRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'description',
        'code',
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
        return tariff::class;
    }
}
