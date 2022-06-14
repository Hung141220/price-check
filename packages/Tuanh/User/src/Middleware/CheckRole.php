<?php

namespace Tuanh\User\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Tuanh\User\Model\Permission;
use Tuanh\User\Model\Role;
use Tuanh\User\Model\User;

use function PHPUnit\Framework\isEmpty;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $routeUri = Route::getFacadeRoot()->current()->action['as'];
        // dd($routeUri);
        if (Auth::id() == User::$admin) {
            return $next($request);
        } else {
            $routeUri = Route::getFacadeRoot()->current()->uri();
            $routeMethod = Route::getFacadeRoot()->current()->methods[0];
            // dd($routes);
            $current = [
                'method' => $routeMethod,
                'uri' => $routeUri
            ];
            $user = User::find(Auth::id());
            $uriMethod = array();
            $roles = $user->roles;
            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    $uriMethod[] = [
                        'method' => $permission->method,
                        'uri' => $permission->uri
                    ];
                }
            }
            $permissions = $user->permissions;
            foreach ($permissions as $permission) {
                $uriMethod[] = [
                    'method' => $permission->method,
                    'uri' => $permission->uri
                ];
            }
            // dd(in_array($current, $uriMethod));
            if (in_array($current, $uriMethod)) {
                return $next($request);
            } else {
                return redirect()->route('403');
            }
        }
    }
}

