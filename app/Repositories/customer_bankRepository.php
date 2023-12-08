<?php

namespace App\Repositories;

use App\Models\customer_bank;
use App\Repositories\BaseRepository;

class customer_bankRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'payment_uid',
        'customer_uid',
        'transaction',
        'transaction_type',
        'amount',
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
        return customer_bank::class;
    }
}
