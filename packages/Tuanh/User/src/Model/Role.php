<?php

namespace Tuanh\User\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $table = 'roles';
    protected $guarded = [];
    public $timestamp = false;
    public function users()
    {
        return $this->belongsToMany(User::class, UserRole::class, 'role_id', 'user_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }


}
