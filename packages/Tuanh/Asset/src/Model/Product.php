<?php

namespace Tuanh\Asset\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'product_brand', 'product_id', 'brand_id');
    }
    public function infomation()
    {
        return $this->hasOne(Infomation::class, 'product_id', 'id');
    }
}
