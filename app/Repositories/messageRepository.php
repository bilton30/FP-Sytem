<?php

namespace App\Repositories;

use App\Models\message;
use App\Repositories\BaseRepository;

class messageRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'resend_uid',
        'body',
        'sender',
        'destination',
        'destination_uid',
        'destination_uid',
        'status',
        'report_message',
        'status_message',
        'status_json',
        'sent_at',
        'cost',
        'currency',
        'plataform',
        'new_balance',
        'registration_customer_uid',
        'payment_uid',
        'debit_warning_uid',
        'balance_warning_user_uid',
        'bulk_uid',
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
        return message::class;
    }
}
