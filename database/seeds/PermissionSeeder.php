<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routeList = Route::getRoutes();
        foreach ($routeList as $route) {
            $uri = $route->uri;
            $method = $route->methods[0];
            if (DB::table('permissions')->where('uri', $uri)->where('method', $method)->doesntExist()) {
                DB::table('permissions')->insert([
    
                    'uri' => $uri,
                    'method' => $method,
    
                ]);
            }
        }
    }
}
