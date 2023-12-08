<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class company extends Model
{
    use SoftDeletes, HasUuids,UsesTenantConnection;
    
    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'companies';
    
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
        'name',
        'email',
        'website',
        'nuit',
        'contact1',
        'contact2',
        'prefix',
        'address',
        'status',
        'id',
        'app_uid',
        'sync_uid',
        'sync_at',
        'deleted_at',
        'updated_user_uid',
        'deleted_user_uid'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'website' => 'string',
        'nuit' => 'string',
        'contact1' => 'string',
        'contact2' => 'string',
        'prefix' => 'string',
        'address' => 'string',
        'status' => 'integer',
        // 'id' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'email' => 'email',
        'website' => 'required',
        'nuit' => 'required',
        // 'prefix' => 'required',
        // 'uid' => 'required'  'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];
    
    public function invoice_contacts()
    {
        return $this->hasMany(invoice_contacts::class,"company_uid");
    }
 
}
