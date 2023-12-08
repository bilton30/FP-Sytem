<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class payment extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'payments';

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
        'uid',
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
        'comments',
        'deposited_changes',
        'confirmed_at',
        'confirmed_user_uid',
        'id',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    protected $casts = [
        'id' => 'string',
        'reference' => 'string',
        'customer_uid' => 'string',
        'payment_water_uid' => 'string',
        'payment_service_uid' => 'string',
        'payment_product_uid' => 'string',
        'payment_cashier_uid' => 'string',
        'payment_method_uid' => 'string',
        'comments' => 'string',
        'total' => 'decimal:2',
        'total_received' => 'decimal:2',
        'changes' => 'decimal:2',
        'deposited_changes' => 'decimal:2',
        'confirmed_user_uid' => 'string',
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        'total' => 'required',
        'total_received' => 'required',
        'customer_uid' => ['required', 'string', 'exists:App\Models\customer,id'],
        // 'customer_uid' => ['required', 'string', 'exists:App\Models\customer,id'],


    ];
    public function customers()
    {
        return $this->belongsTo(customer::class, 'customer_uid');
    }
    
    public function payment_type()
    {
        return $this->belongsTo(payment_type::class, 'payment_method_uid');
    }

    public function customer_banks()
    {
        return $this->hasMany(customer_bank::class,"customer_uid");
    }
}
