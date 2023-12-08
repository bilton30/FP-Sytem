<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesLandlordConnection;
use Illuminate\Database\Eloquent\SoftDeletes;
class Landlord extends Model
{
    use HasFactory, UsesLandlordConnection;

    protected $table = 'tenants';
}
