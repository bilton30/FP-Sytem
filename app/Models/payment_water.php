<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class payment_water extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'payment_waters';

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
        'uid',
        'id',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    protected $casts = [
        'recharge' => 'string',
        'customer_uid' => 'string',
        'product_uid' => 'string',
        'tariff_scale_uid' => 'string',
        'description' => 'string',
        'code' => 'string',
        'quantity' => 'decimal:2',
        'reading_month' => 'date',
        'reading' => 'decimal:2',
        'last_reading' => 'decimal:2',
        'price' => 'decimal:2',
        'calculation_details' => 'string',
        'payment_type' => 'string',
        'total_price' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'debit_day' => 'date',
        'tax_uid' => 'string',
        'tax_name' => 'string',
        'tax_total' => 'decimal:2',
        'service_charge' => 'decimal:2',
        'debit' => 'decimal:2',
        'total_payed' => 'float',
        'uid' => 'string',
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        'customer_uid' => 'required',
        'product_uid' => 'required',
        'tariff_uid' => 'required',
        'code' => 'required',
        'quantity' => 'required',
        'reading_month' => 'required',
        'reading' => 'required',
        'last_reading' => 'required',
        'price' => 'required',
        'total_price' => 'required',
        'uid' => 'required'
    ];
    public function products()
    {
        return $this->belongsTo(company::class, 'product_uid');
    }
    public function tariffs()
    {
        return $this->belongsTo(company::class, 'tariff_uid');
    }
    public function customers()
    {
        return $this->belongsTo(company::class, 'customer_uid');
    }
}
