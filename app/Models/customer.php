<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class customer extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'customers';

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
        'balance',
        'debt',
        'debt_count',
        'payment_type',
        'counter_number',
        'counter_details',
        'gend',
        'tariff_uid',
        'name',
        'code',
        'nuit',
        'email',
        'contact1',
        'contact2',
        'prefix',
        'birthday',
        'natal_at',
        'new_year_at',
        'address_neighborhood_uid',
        'adress_details',
        'status',
        'tags',
        'id',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'debt' => 'decimal:2',
        'debt_count' => 'integer',
        'payment_type' => 'string',
        'counter_number' => 'string',
        'counter_details' => 'string',
        'gend' => 'string',
        'tariff_uid' => 'string',
        'name' => 'string',
        'code' => 'string',
        'nuit' => 'string',
        'email' => 'string',
        'contact1' => 'string',
        'contact2' => 'string',
        'prefix' => 'string',
        'birthday' => 'date', 
        'address_neighborhood_uid' => 'string',
        'adress_details' => 'string',
        'status' => 'integer',
        'tags' => 'string',
        'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];

    public static array $rules = [
        'debt' => 'required',
        'name' => 'required',
        'email' => 'email',
        'birthday' => 'required',
        'uid' => 'required',
        'tariff_uid' => 'required   ',
        'address_neighborhood_uid' => ['required', 'string', 'exists:App\Models\address_neighborhood,id'],
        'adress_details' => 'required',
        'tariff_uid' => ['required', 'string', 'exists:App\Models\Tariff,id']
    ];

    public function temp_reading()
    {
        return $this->hasMany(customer_temp_reading::class,"customer_uid");
    }
    public function neighborhoods()
    {
        return $this->belongsTo(customer::class, 'address_neighborhood_uid');
    }

    public function customer_banks()
    {
        return $this->hasMany(customer_bank::class,"customer_uid");
    }
    public function payment_water()
    {
        return $this->hasMany(payment_water::class,"tariff_uid");
    }
}
