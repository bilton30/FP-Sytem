<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class product extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'products';

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
        'description',
        'price',
        'code',
        'name',
        'type',
        "uid",
        'id',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    protected $casts = [
        'description' => 'string',
        'price' => 'decimal:2',
        'code' => 'string',
        'name' => 'string',
        'type' => 'string',
        'uid' => 'string',  
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        'price' => 'required',
        'code' => 'required',
        'uid' => 'required'
        
    ];
    public function payment_water()
    {
        return $this->hasMany(payment_water::class,"product_uid");
    }
    
}
