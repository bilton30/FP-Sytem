<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Facades\Artisan;
use DB;
class TenantModel extends Tenant
{
  use HasUuids;
    protected $table = 'tenants';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'name',
        'domain',
        'company_id',
        'database',
    ];
    public static function booted()
    {
        static::created(function (TenantModel $model) {
            $model->createDatabase();
        });
    }

    public function createDatabase()
    {
        DB::connection('tenant')->statement("CREATE DATABASE {$this->database}");
        // Use Artisan to call the command to create the database
        Artisan::call('tenants:artisan "migrate --database=tenant --force" --tenant='.$this->getKey());
    }
}
