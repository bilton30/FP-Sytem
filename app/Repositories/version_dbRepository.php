<?php

namespace App\Repositories;

use App\Models\version_db;
use App\Repositories\BaseRepository;

class version_dbRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'version',
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
        return version_db::class;
    }
}
