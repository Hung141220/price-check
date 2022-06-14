<?php

namespace Tuanh\User\Model;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    public static $admin = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       // 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    public function getNameAttribute($value)
    {
        return $this->attributes['name'] = ucfirst($value);
    }

    //relationship
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, UserRole::class, 'user_id', 'role_id');
    }
    //end relationship

    //crud  
   
    public function del($id)
    {
        $user = Self::find($id);
        $isDelete = $user->delete();
        return $isDelete;
    }
    //end crud
    public static function checkLogin($email, $password)
    {
        $isLogin = Auth::attempt(['email'=>$email, 'password'=>$password]);
        return $isLogin;
    }
    public function checkPermissionAccess($permissionCheck)
    {
        //user login vao he thong => role
        $roles = Auth::user()->roles;
        // show role
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('method', $permissionCheck)) {
                return true;
            }
            return false;
        }
    }
    // public function 
    
}
