<?php

namespace App\Repositories;

use App\Models\payment;
use App\Repositories\BaseRepository;

class paymentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'uid',
        'id',
        'reference',
        'customer_uid',
        'payment_water_uid',
        'payment_service_uid',
        'payment_product_uid',
        'payment_cashier_uid',
        'payment_method_uid',
        'total',
        'total_received',
        'changes',
        'deposited_changes',
        'confirmed_at',
        'confirmed_user_uid', 
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid',
        'comments'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return payment::class;
    }
}
