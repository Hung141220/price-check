<?php

namespace Tuanh\Asset\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;
    protected $table = 'types';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
    public function infomation()
    {
        return $this->hasOne(Infomation::class, 'type_id', 'id');
    }
}
