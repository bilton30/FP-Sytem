<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class message extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'messages';

    public $fillable = [
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
        'uid',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    protected $dates = ['server_created_at']; // Para tratar o campo como uma data do Carbon
    
    // Defina o evento de criação
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->server_created_at = now();
        });
    }
    
    protected $casts = [
        'resend_uid' => 'string',
        'body' => 'string',
        'sender' => 'string',
        'destination' => 'string',
        'destination_uid' => 'string',
        'destination_uid' => 'string',
        'status' => 'integer',
        'report_message' => 'string',
        'status_message' => 'string',
        'status_json' => 'string',
        'cost' => 'decimal:2',
        'currency' => 'string',
        'plataform' => 'string',
        'new_balance' => 'integer',
        'registration_customer_uid' => 'string',
        'payment_uid' => 'string',
        'debit_warning_uid' => 'string',
        'balance_warning_user_uid' => 'string',
        'bulk_uid' => 'string',
        'tags' => 'string',
        'uid' => 'string',
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        'resend_uid' => 'required',
        'body' => 'required',
        'sender' => 'required',
        'destination' => 'required',
        'destination_uid' => 'required',
        'status' => 'required',
        'currency' => 'required',
        'uid' => 'required'
    ];

    
}
