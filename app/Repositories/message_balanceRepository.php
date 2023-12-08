<?php

namespace App\Repositories;

use App\Models\message_balance;
use App\Repositories\BaseRepository;

class message_balanceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'balance',
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
        return message_balance::class;
    }
}
