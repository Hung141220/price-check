<?php

namespace Tuanh\Asset\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tuanh\Asset\Model\Brand;
use Tuanh\Asset\Model\Product;

class BrandController extends Controller
{
    private $brand;
    private $product;
    public function __construct(Brand $brand, Product $product)
    {
        $this->brand = $brand;
        $this->product = $product;
    }
    public function index()
    {
        $brands = $this->brand->paginate(5);
        return view('asset::brand.index', compact('brands'));
    }
    public function create()
    {
        $products = $this->product->all();
        return view('asset::brand.create-form', compact('products'));
    }
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $data = $request->validate([
            'name' => 'required|unique:brands',
        ]);
        $brand = $this->brand->create($data);
        $brand->products()->attach($product_id);
        return redirect()->route('brand.list');
    }
    public function edit($id)
    {
        $brand = $this->brand->find($id);
        $products= $this->product->all();
        $productOfBrand = $brand->products;
        return view('asset::brand.edit-form', compact('products', 'brand', 'productOfBrand'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $product_id = $request->input('product_id');
        $data = $request->validate([
            'name' => 'required',
        ]);
        $isUpdate = $this->brand->find($id)->update($data);
        $brand = $this->brand->find($id);
        if ($isUpdate) {
            $brand->products()->sync($product_id);
            return redirect()->route('brand.list');
        } else {
            return redirect()->back();
        }
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $isDelete = $this->brand->find($id)->delete();
        if ($isDelete) {
            return redirect()->route('brand.list');
        } else {
            return redirect()->back();
        }
    }
    public function trash(Request $request)
    {
        $brands = $this->brand->onlyTrashed()->paginate(5);
        return view('asset::brand.trash', compact('brands'));
    }
    public function unTrash(Request $request)
    {
        $id = $request->input('id');
        $brand = $this->brand->withTrashed()->find($id);
        $is = $brand->restore();
        if ($is) {
            return redirect()->route('brand.list');
        } else {
            return redirect()->back();
        }
    }
    public function get($id)
    {
        $product = $this->product->find($id);
        $brands = $product->brands;
        return json_encode($brands);
    }
}
