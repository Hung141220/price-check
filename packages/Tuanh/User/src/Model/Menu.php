<?php

namespace Tuanh\User\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'menus';
    public function menuChild()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
