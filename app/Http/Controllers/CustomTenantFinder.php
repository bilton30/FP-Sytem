<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Multitenancy\TenantFinder\TenantFinder;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;
use Spatie\Multitenancy\Models\Tenant;
class CustomTenantFinder extends TenantFinder
{
    use UsesTenantModel;
    
    public function findForRequest(Request $request): ?Tenant
    {
        // Implemente a lógica para encontrar o tenant com base na requisição (por exemplo, no cabeçalho da solicitação)
        // Substitua esta lógica pela forma como você deseja identificar o tenant
         // Verifica se a solicitação é uma solicitação de API
         if ($this->isApiRequest($request)) {
            // Implemente a lógica de encontrar o tenant com base na solicitação de API
            // Pode ser baseado em cabeçalhos, tokens, etc.
          
             $apiTenantUid = $request->header('X-API-Tenant-ID');

            if ($apiTenantUid) {
                return Tenant::whereId($apiTenantUid)->first();
            }
        } else {
            // Se não for uma solicitação de API, verifica o domínio da web
            $host = $request->getHost();

            return Tenant::whereDomain($host)->first();
        }

        return null;
    }

    protected function isApiRequest(Request $request): bool
    {
        // Implemente a lógica para verificar se é uma solicitação de API
        // Isso pode ser baseado em cabeçalhos, rotas específicas, etc.
        return $request->is('api/*') ;
    }
    
}
