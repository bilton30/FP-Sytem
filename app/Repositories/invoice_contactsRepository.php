<?php

namespace App\Repositories;

use App\Models\invoice_contacts;
use App\Repositories\BaseRepository;

class invoice_contactsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'contact',
        'description',
        'company_uid',
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
        return invoice_contacts::class;
    }
}
