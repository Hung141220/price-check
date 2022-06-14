<?php

namespace Tuanh\Asset\Model;

use Illuminate\Database\Eloquent\Model;

class Infomation extends Model
{
    protected $table = 'infomations';
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function searchInfo($data)
    {
        $row = self::where('product_id', $data[0])
                ->where('brand_id', $data[1])
                ->where('vehicle_id', $data[2])
                ->where('type_id', $data[3])
                ->where('year', $data[4])
                ->first();
        if (isset($row)) {
            $price = $row->price;
            $price_loan = $row->price_loan;
            $product_name = Product::find($data[0])->name;
            $brand_name = Brand::find($data[1])->name;
            $vehicle_name = Vehicle::find($data[2])->name;
            $type_name = Type::find($data[3])->name;
            $info = [$product_name, $brand_name, $vehicle_name, $type_name, $price, $price_loan];
            return $info;
        }
        return $info = array();
    }
}
