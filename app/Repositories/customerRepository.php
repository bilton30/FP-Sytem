<?php

namespace App\Repositories;

use App\Models\customer;
use App\Repositories\BaseRepository;

class customerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'balance',
        'debt',
        'debt_count',
        'payment_type',
        'counter_number',
        'counter_details',
        'gend',
        'tariff_uid',
        'name',
        'code',
        'nuit',
        'email',
        'contact1',
        'contact2',
        'prefix',
        'birthday',
        'natal_at',
        'new_year_at',
        'address_neighborhood_uid',
        'adress_details',
        'status',
        'tags',
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
        return customer::class;
    }
}
