<?php

namespace Tuanh\User\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $guarded = [];
    public $timestamp = false;
    public function users()
    {
        return $this->belongsToMany(User::class, UserPermission::class, 'permission_id', 'user_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, RolePermission::class, 'permission_id', 'role_id');
    }
    public function findByUri($uri)
    {
        $row = $this::where('uri', $uri)->firstOrFail();
        // $id = $row->id;
        return $row;
    }
}   
