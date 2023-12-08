<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class tariff_scale extends Model
{
    use SoftDeletes,HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'tariff_scales';

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
        'tariff_uid',
        'start_quantity',
        'end_quantity',
        'price',
        'service_price',
        'minimum_quantity',
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
        'tariff_uid' => 'string',
        'start_quantity' => 'decimal:2',
        'end_quantity' => 'decimal:2',
        'price' => 'decimal:2',
        'service_price' => 'decimal:2',
        'minimum_quantity' => 'decimal:2',
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        'tariff_uid' => ['required', 'string', 'exists:App\Models\tariff,id'],
        'start_quantity' => 'required',
        'end_quantity' => 'required',
        'price' => 'required',
        'service_price' => 'required'
    ];

    public function tariffs()
    {
        return $this->belongsTo(company::class, 'tariff_uid');
    }
}
