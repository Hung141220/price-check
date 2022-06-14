<?php

namespace Tuanh\Asset\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;
    protected $table = 'Vehicles';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function types()
    {
        return $this->hasMany(Type::class, 'vehicle_id', 'id');

    }
    public function infomation()
    {
        return $this->hasOne(Infomation::class, 'vehicle_id', 'id');
    }
}
