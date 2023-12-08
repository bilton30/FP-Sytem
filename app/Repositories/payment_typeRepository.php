<?php

namespace App\Repositories;

use App\Models\payment_type;
use App\Repositories\BaseRepository;

class payment_typeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'description',
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
        return payment_type::class;
    }
}
