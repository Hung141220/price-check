<?php
namespace Tuanh\Asset\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tuanh\Asset\Model\Product;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index()
    {
        $products = $this->product->paginate(5);
        return view('asset::product.index', compact('products'));
    }
    public function create()
    {
        return view('asset::product.create-form');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:products',
        ]);
        $isCreate = $this->product->create($data);
        if($isCreate){
            return redirect()->route('product.list');
        } else {
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $product = $this->product->find($id);
        return view('asset::product.edit-form', compact('product'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $data = $request->validate([
            'name' => 'required',
        ]);
        $isUpdate = $this->product->find($id)->update($data);
        if ($isUpdate) {
            return redirect()->route('product.list');
        } else {
            return redirect()->back();
        }
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $isDelete = $this->product->find($id)->delete();
        if ($isDelete) {
            return redirect()->route('product.list');
        } else {
            return redirect()->back();
        }
    }
    public function trash(Request $request)
    {
        $products = $this->product->onlyTrashed()->paginate(5);
        return view('asset::product.trash', compact('products'));
    }
    public function unTrash(Request $request)
    {
        $id = $request->input('id');
        $product = $this->product->withTrashed()->find($id);
        $is = $product->restore();
        if ($is) {
            return redirect()->route('product.list');
        } else {
            return redirect()->back();
        }
    }
}
