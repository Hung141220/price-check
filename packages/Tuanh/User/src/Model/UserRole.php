<?php

namespace Tuanh\User\Model;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';
    protected $guarded = [];
    public $timestamp = false;
}
