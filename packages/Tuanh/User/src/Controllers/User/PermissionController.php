<?php

namespace Tuanh\User\Controllers\User;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use Tuanh\User\Model\Permission;

class PermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }
    public function index()
    {
        $permissions = $this->permission->paginate(5);
        return view('user::permission.index', compact('permissions'));
    }
}
