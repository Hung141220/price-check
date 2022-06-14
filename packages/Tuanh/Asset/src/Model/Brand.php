<?php


namespace Tuanh\Asset\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $table = 'brands';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_brand', 'brand_id', 'product_id');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'brand_id', 'id');
    }
    public function infomation()
    {
        return $this->hasOne(Infomation::class, 'brand_id', 'id');
    }

}
