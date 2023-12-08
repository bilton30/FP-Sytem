<?php

namespace App\Repositories;

use App\Models\invoice_category_info;
use App\Repositories\BaseRepository;

class invoice_category_infoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
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
        return invoice_category_info::class;
    }
}
