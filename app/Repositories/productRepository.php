<?php

namespace App\Repositories;

use App\Models\product;
use App\Repositories\BaseRepository;

class productRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'description',
        'price',
        'code',
        'name',
        'type',
        'uid',
        'id', 
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
        return product::class;
    }
}
