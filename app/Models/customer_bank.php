<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class customer_bank extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'customer_banks';

    protected $dates = ['server_created_at']; // Para tratar o campo como uma data do Carbon
    
    // Defina o evento de criação
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->server_created_at = now();
        });
    }
    
    public $fillable = [
        'payment_uid',
        'customer_uid',
        'transaction',
        'transaction_type',
        'amount',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
        // 'uid'
    ];

    protected $casts = [
        'payment_uid' => 'string',
        'customer_uid' => 'string',
        'transaction' => 'integer',
        'transaction_type' => 'string',
        'amount' => 'decimal:2',
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        // 'uid' => 'required'
    ];
    public function customers()
    {
        return $this->belongsTo(customer::class, 'customer_uid');
    }
    public function payments()
    {
        return $this->belongsTo(payment::class, 'payment_uid');
    }
    
}
