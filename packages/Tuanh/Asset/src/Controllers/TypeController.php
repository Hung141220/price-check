<?php
namespace Tuanh\Asset\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Tuanh\Asset\Model\Type;
use Tuanh\Asset\Model\Vehicle;

class TypeController extends Controller
{
    private $type;
    private $vehicle;
    public function __construct(Type $type, Vehicle $vehicle)
    {
        $this->type = $type;
        $this->vehicle = $vehicle;
    }
    public function index()
    {
        $types = $this->type->with('vehicle')->paginate(5);
        return view('asset::type.index', compact('types'));
    }
    public function create()
    {
        $vehicles = $this->vehicle->all();
        return view('asset::type.create-form', compact('vehicles'));
    }
    public function store(Request $request)
    {
        $vehicle_id = $request->input('vehicle_id');
        $data = $request->validate([
            'name' => 'required|unique:types',
            'vehicle_id' => 'required'
        ]);
        $tye = $this->type->create($data);
        return redirect()->route('type.list');
    }
    public function edit($id)
    {
        $type = $this->type->find($id);
        $vehicleOfType = $type->vehicle;
        $vehicles = $this->vehicle->all();
        return view('asset::type.edit-form', compact('type', 'vehicleOfType', 'vehicles'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $vehicle_id = $request->input('vehicle_id');
        $data = $request->validate([
            'name' => 'required',
            'vehicle_id' => 'required'
        ]);
        $isUpdate = $this->type->find($id)->update($data);
        if ($isUpdate) {
            return redirect()->route('type.list');
        } else {
            return redirect()->back();
        }
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $isDelete = $this->type->find($id)->delete();
        if ($isDelete) {
            return redirect()->route('type.list');
        } else {
            return redirect()->back();
        }
    }
    public function trash(Request $request)
    {
        $types = $this->type->onlyTrashed()->paginate(5);
        return view('asset::type.trash', compact('types'));
    }
    public function unTrash(Request $request)
    {
        $id = $request->input('id');
        $type = $this->type->withTrashed()->find($id);
        $is = $type->restore();
        if ($is) {
            return redirect()->route('type.list');
        } else {
            return redirect()->back();
        }
    }
    public function get($id)
    {
        $vehicle = $this->vehicle->find($id);
        $types = $vehicle->types;
        return json_encode($types);
    }
}
