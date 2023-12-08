<?php

namespace App\Repositories;

use App\Models\invoice_info;
use App\Repositories\BaseRepository;

class invoice_infoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description',
        'category_uid',
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
        return invoice_info::class;
    }
}
