<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\PermissionGeneratorController;
class RolesSeeder extends Seeder
{
    use PermissionGeneratorController;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->synchronizelPermission();

        $role = Role::create(['name' => 'Admin']);

        $role = Role::create(['name' => 'Company']);

        $permissions = Permission::where('guard_name', 'web')->get();
         
        $role->syncPermissions($permissions);
    }
}
