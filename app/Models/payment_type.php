<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class payment_type extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'payment_types';

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
        'description' => 'string',
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

    public function payment()
    {
        return $this->hasMany(payment::class,"payment_method_uid");
    }
}
