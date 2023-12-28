<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\MultitenancyConnection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use SoftDeletes, HasUuids,HasFactory,MultitenancyConnection;

    public $incrementing = false;

    protected $keyType = 'string';

    public $fillable = [
        'name',
        'email',
        'logo',
        'nuit',
        'contact1',
        'contact2',
        'address',
        'id',
        'company_id',
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

        'nuit' => 'required',
        // 'prefix' => 'required',
        // 'uid' => 'required'  'app_uid' => 'string',
        'sync_uid' => 'string',
        'sync_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
        'updated_user_uid' => 'string',
        'deleted_user_uid' => 'string'
    ];
}
