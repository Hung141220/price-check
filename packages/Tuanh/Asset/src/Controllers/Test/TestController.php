<?php


namespace Tuanh\Asset\Controllers\Test;


use Illuminate\Http\Request;
use Tuanh\Asset\Helper;
use Tuanh\Asset\Model\Brand;
use Tuanh\Asset\Model\Infomation;
use Tuanh\Asset\Model\Product;
use Tuanh\Asset\Model\Type;
use Tuanh\Asset\Model\Vehicle;

class TestController extends \App\Http\Controllers\Controller{

    /** test package
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private $infomation;
    public function __construct(Infomation $infomation)
    {
        $this->infomation = $infomation;
    }
    public function index(Request $request){
        // $test=Helper::gateWayAction('test',array());
        $products = Product::all();
        $brands = Brand::all();
        $vehicles = Vehicle::all();
        $types = Type::all(); 
        return view("asset::test.index", compact('products', 'brands', 'vehicles', 'types'));
    }
    public function main(Request $request)
    {
        $product_id = $request->input('product_id');
        $brand_id = $request->input('brand_id');
        $vehicle_id = $request->input('vehicle_id');
        $type_id = $request->input('type_id');
        $year = $request->input('year');
        $data = [$product_id, $brand_id, $vehicle_id, $type_id, $year];
        $info =  $this->infomation->searchInfo($data);
        if (count($info) > 0) {
            return view('asset::test.info', compact('info'));
        } else {
            return redirect()->back();
        }
    }

}
