<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

trait PermissionGeneratorController 
{
    public $ignore_classes = [
            'AppBaseController',
            'Controller',
            'PermissionGeneratorController',
            'Helper\Upload',
            'CustomTenantFinder',
            'ResolverController',
            'createTenent',
            'migrateTenet',
            'createDatabaseTenant',
            'setup'
        ];
        public $ignore_method = [
           'synchronizelpermission',
           'classlist',
           'allpermission',
           ''

        ];

    public function synchronizelPermission()
    {
        if ($this->allPermission()) {
            return true;
        } else {
            return false;
        }
    }

    public function classList()
    {
        // $path = __DIR__;
        $path = app_path('Http' . DIRECTORY_SEPARATOR . 'Controllers');
        $fqcns = array();

        $allFiles = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        $phpFiles = new \RegexIterator($allFiles, '/\.php$/');
        foreach ($phpFiles as $phpFile) {
            $content = file_get_contents($phpFile->getRealPath());
            $tokens = token_get_all($content);
            $namespace = '';
            for ($index = 0; isset($tokens[$index]); $index++) {
                if (!isset($tokens[$index][0])) {
                    continue;
                }
                if (T_NAMESPACE === $tokens[$index][0]) {
                    $index += 2; // Skip namespace keyword and whitespace
                    while (isset($tokens[$index]) && is_array($tokens[$index])) {
                        $namespace .= $tokens[$index++][1];
                    }
                }
                if (T_CLASS === $tokens[$index][0] && T_WHITESPACE === $tokens[$index + 1][0] && T_STRING === $tokens[$index +
                    2][0]) {
                    $index += 2; // Skip class keyword and whitespace
                    if ($namespace != 'App\Http\Controllers\Auth') {
                        $fqcns[] = $namespace . '\\' . $tokens[$index][1];
                    }


                    # break if you have one class per file (psr-4 compliant)
                    # otherwise you'll need to handle class constants (Foo::class)
                    break;
                }
            }
        }

        return $fqcns;
    }

    public function allPermission()
    {
        $status = false;
        foreach ($this->classList() as $class_item) {
            $class = str_replace('App\Http\Controllers\\', '', $class_item);
            // dd(!in_array($class, $this->ignore_classes));
            if (
                !in_array($class, $this->ignore_classes)
            ) {

                $methods = $this->get_this_class_methods("App\Http\Controllers\\" . $class);
                foreach ($methods as $method_name) {
                    if (
                        '__construct' != $method_name &&
                        'get_this_class_methods' != $method_name &&
                        substr($method_name, 0, 3) != "___" // Para egnorar methods que iniciam cm ___
                    ) {
                        if (
                            !in_array($method_name, $this->ignore_method)
                        ) {
                            $class_name = str_replace('Controller', '', $class);
                            // echo $class_name . '-' . $method_name . "\n";
                            $permission_name = str_replace('Controller', '', $class_name . '-' . $method_name);
                            $permission_name = str_replace('\\', '-', $permission_name);
                            // dd($permission_name);
                            $guard_name = str_starts_with(Str::lower($permission_name), 'api') ? 'api' : 'web';
                            if (!Permission::where('name', $permission_name)->first()) {
                                $permission = Permission::create([
                                    'name' => Str::lower($permission_name),
                                    'guard_name' =>$guard_name,
                                ]);
                                if ($permission) {
                                    $status = true;
                                }
                            }
                        }
                    }
                }
            }
        }


        return $status;
    }


    public function get_this_class_methods($class)
    {
        if (class_exists($class)) {
                $array1 = get_class_methods($class);

                if ($parent_class = get_parent_class($class)) {
                    $array2 = get_class_methods($parent_class);
                    $array3 = array_diff($array1, $array2);
                } else {
                    $array3 = $array1;
                }

                return $array3;
            } else {
                // Lida com o caso em que a classe não existe
                return [];
            }
    }
}
