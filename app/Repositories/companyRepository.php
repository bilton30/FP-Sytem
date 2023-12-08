<?php

namespace App\Repositories;

use App\Models\company;
use App\Repositories\BaseRepository;

class companyRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'email',
        'website',
        'nuit',
        'contact1',
        'contact2',
        'prefix',
        'address',
        'status',
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
        return company::class;
    }
}
