<?php

namespace Tuanh\User\Controllers\User;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Tuanh\User\Model\Permission;
use Tuanh\User\Model\Role;
use Tuanh\User\Model\User;

class UserController extends Controller
{
    private $user;
    private $role;
    private $permission;
    //khai bao model
    public function __construct(User $user, Role $role, Permission $permission)
    {
        $this->user = $user;
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $users = $this->user->paginate(5);
        $users = $this->user->whereNotIn('id', [Auth::id()])->paginate(5);
        return view('user::user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        $permissions = $this->permission->all();
        return view('user::user.create-form', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $data = $request->validate([
                'name' => 'required|min:3|unique:users',
                'email' => 'required|min:3',
                'password' => 'required'
            ]);
            $roleIds = $request->input('role_id');
            $permissionIds = $request->input('permission_id');
            $user = $this->user->create($data);
            $user->roles()->attach($roleIds);
            $user->permissions()->attach($permissionIds);
            DB::commit();
            return redirect()->route('user.list');
        } catch(Exception $exception){ 
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--- Line:'. $exception->getLine()); 
        }
    }
    public function edit($id)
    {   
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        $permissions = $this->permission->all();
        $permissionsOfUser = $user->permissions;
        return view('user::user.edit-form', compact('roles', 'user', 'rolesOfUser', 'permissions', 'permissionsOfUser'));
    }

    public function update(Request $request)
    {   
        try{
            DB::beginTransaction();
            $id = $request->input('id');
            $isUpdate = $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => $request->password,   
            ]);
            $user = $this->user->find($id);
            
            $roleIds = $request->input('role_id');
            $user->roles()->sync($roleIds);

            $permissionIds = $request->input('permission_id');
            $user->permissions()->sync($permissionIds);
            DB::commit();
            return redirect()->route('user.list');
        } catch(Exception $exception){
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--- Line:'. $exception->getLine()); 
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $user = $this->user->find($id);
        //del relationship
        // $roles = $user->roles;
        // $roleIds = array();
        // foreach($roles as $role){
        //     $roleIds[] = $role->id;
        // }
        // $user->roles()->detach($roleIds);

        //del record
        $isDelete = $this->user->del($id);
        if ($isDelete) {
            return redirect()->route('user.list');
        }
    }
    public function trash(Request $request)
    {
        $users = $this->user->onlyTrashed()->paginate(5);
        return view('user::user.trash', compact('users'));
    }
    public function unTrash(Request $request)
    {
        $id = $request->input('id');
        $user = $this->user->withTrashed()->find($id);
        $user->restore();
        return redirect()->back();
    }
}
