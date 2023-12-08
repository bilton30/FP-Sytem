<?php

namespace App\Repositories;

use App\Models\payment_water;
use App\Repositories\BaseRepository;

class payment_waterRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'recharge',
        'customer_uid',
        'product_uid',
        'tariff_scale_uid',
        'description',
        'code',
        'quantity',
        'reading_month',
        'reading',
        'last_reading',
        'price',
        'calculation_details',
        'payment_type',
        'total_price',
        'subtotal',
        'debit_day',
        'tax_uid',
        'tax_name',
        'tax_total',
        'tax_percentage',
        'service_charge',
        'debit',
        'total_payed',
        'confirmed_at',
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
        return payment_water::class;
    }
}
