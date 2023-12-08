<?php

namespace App\Repositories;

use App\Models\customer_temp_reading;
use App\Repositories\BaseRepository;

class customer_temp_readingRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'reading_month',
        'reading',
        'customer_uid',
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
        return customer_temp_reading::class;
    }
}
