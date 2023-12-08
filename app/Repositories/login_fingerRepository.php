<?php

namespace App\Repositories;

use App\Models\login_finger;
use App\Repositories\BaseRepository;

class login_fingerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'date_time',
        'date',
        'time',
        'device_name',
        'device_id',
        'person_name',
        'card_number',
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
        return login_finger::class;
    }
}
