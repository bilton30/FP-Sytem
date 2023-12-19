<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Tenant;
class Tenant extends Tenant
{
    public static function booted()
    {
        static::creating(fn(CustomTenantModel $model) => $model->createDatabase());
    }

    public function createDatabase()
    {
        // add logic to create database
    }
}
