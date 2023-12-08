<?php

namespace App\Repositories;

use App\Models\tax;
use App\Repositories\BaseRepository;

class taxRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'code',
        'description',
        'percentage',
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
        return tax::class;
    }
}
