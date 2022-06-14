<?php

namespace Tuanh\User\Controllers\User;

use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tuanh\User\Model\Permission;
use Tuanh\User\Model\Role;

use function Ramsey\Uuid\v1;

class RoleController extends Controller
{
    use SoftDeletes;
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index()
    {
        $roles = $this->role->paginate(5);
        return view('user::role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = $this->permission->all();
        return view('user::role.create-form', compact('permissions'));
    }
    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'role_name' => 'required|min:3|unique:roles'
            ]);
            $permissionIds = $request->input('permission_id');
            $role = $this->role->create($data);
            $role->permissions()->attach($permissionIds);
            DB::commit();
            return redirect()->route('role.list');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message:' . $exception->getMessage() . '--- Line:'. $exception->getLine()); 
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissionsOfRole = $role->permissions;
        $permissions = $this->permission->all();
        return view('user::role.edit-form', compact('role', 'permissionsOfRole', 'permissions'));

    }
    public function update(Request $request)
    {
        // $id = $request->input('id');
        // $isUpdate = $this->role->find($id)->update([
        //     'role_name' => $request->input('role_name')
        // ]);
        // $role = $this->role->find($id);
        // $permissionIds = $request->input('permission_id');
        // $role->permissions()->sync($permissionIds);
        // return redirect()->route('role.list');

        try {
            DB::beginTransaction();
            $id = $request->input('id');
            $isUpdate = $this->role->find($id)->update([
                'role_name' => $request->input('role_name')
            ]);
            $role = $this->role->find($id);
            $permissionIds = $request->input('permission_id');
            $role->permissions()->sync($permissionIds);
                DB::commit();
                return redirect()->route('role.list');
            } catch (Exception $exception) {
                DB::rollBack();
                Log::error('Message:' . $exception->getMessage() . '--- Line:'. $exception->getLine()); 
                return redirect()->back();

        }
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $isDelete = $this->role->find($id)->delete();
        if ($isDelete) {
            return redirect()->route('role.list');
        }
    }
    public function trash(Request $request)
    {
        $roles = $this->role->onlyTrashed()->paginate(5);
        return view('user::role.trash', compact('roles'));
    }
    public function unTrash(Request $request)
    {
        $id = $request->input('id');
        $role = $this->role->withTrashed()->find($id);
        $role->restore();
        return redirect()->back();
    }
}
