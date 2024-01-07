<?php

namespace App\Models\Traits;

use Spatie\Multitenancy\Concerns\UsesMultitenancyConfig;
use Spatie\Multitenancy\Models\Tenant;

trait MultitenancyConnection
{
    use UsesMultitenancyConfig;

    public function getConnectionName()
    {
        if(Tenant::current()) {
            return $this->tenantDatabaseConnectionName();
        } else {
            return $this->landlordDatabaseConnectionName();
        }
    }
}
