<?php
namespace Tuanh\Asset\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Tuanh\Asset\Model\Brand;
use Tuanh\Asset\Model\Vehicle;

class VehicleController extends Controller
{
    private $vehicle;
    private $brand;
    public function __construct(Vehicle $vehicle, Brand $brand)
    {
        $this->vehicle = $vehicle;
        $this->brand = $brand;
    }
    public function index()
    {
        $vehicles = $this->vehicle->with('brand')->paginate(5);
        return view('asset::vehicle.index', compact('vehicles'));
    }
    public function create()
    {
        $brands = $this->brand->all();
        return view('asset::vehicle.create-form', compact('brands'));
    }
    public function store(Request $request)
    {
        $brand_id = $request->input('brand_id');
        $data = $request->validate([
            'name' => 'required|unique:brands',
            'brand_id' => 'required'
        ]);
        $vehicle = $this->vehicle->create($data);
        return redirect()->route('vehicle.list');
    }
    public function edit($id)
    {
        $vehicle = $this->vehicle->find($id);
        $brandOfVehicle = $vehicle->brand;
        $brands = $this->brand->all();
        return view('asset::vehicle.edit-form', compact('vehicle', 'brandOfVehicle', 'brands'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $brand_id = $request->input('brand_id');
        $data = $request->validate([
            'name' => 'required',
            'brand_id' => 'required'
        ]);
        $isUpdate = $this->vehicle->find($id)->update($data);
        if ($isUpdate) {
            return redirect()->route('vehicle.list');
        } else {
            return redirect()->back();
        }
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $isDelete = $this->vehicle->find($id)->delete();
        if ($isDelete) {
            return redirect()->route('vehicle.list');
        } else {
            return redirect()->back();
        }
    }
    public function trash(Request $request)
    {
        $vehicles = $this->vehicle->onlyTrashed()->paginate(5);
        return view('asset::vehicle.trash', compact('vehicles'));
    }
    public function unTrash(Request $request)
    {
        $id = $request->input('id');
        $vehicle = $this->vehicle->withTrashed()->find($id);
        $is = $vehicle->restore();
        if ($is) {
            return redirect()->route('vehicle.list');
        } else {
            return redirect()->back();
        }
    }
    public function get($id)
    {
        $brand = $this->brand->find($id);
        $vehicles = $brand->vehicles;
        return json_encode($vehicles); 
    }

}
