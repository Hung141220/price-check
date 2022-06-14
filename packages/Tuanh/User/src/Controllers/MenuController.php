<?php

namespace Tuanh\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tuanh\User\Helper;
use Tuanh\User\Model\Menu;

class MenuController extends Controller
{
    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
    public function index()
    {
        $menus = $this->menu->paginate(5);
        return view('user::menu.index', compact('menus'));
    }
    public function create()
    {
        $optionSelects = Helper::gateWayAction('menuRecusiveAdd');
        return view('user::menu.create-form', compact('optionSelects'));
    }
    public function store(Request $request)
    {
       $data = [
           'name' => $request->input('name'),
           'parent_id' => $request->input('parent_id'),
           'src' => $request->src,
           'icon' => $request->icon
       ];
       $isCreate = $this->menu->create($data);
        if ($isCreate) {
            return redirect()->route('menu.list');
        }

    }
    public function edit($id)
    {
        $menu = $this->menu->find($id);
        $optionSelects = Helper::gateWayAction('menuRecusiveEdit', null, $menu->parent_id);
        return view('user::menu.edit-form', compact('menu', 'optionSelects'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $data = [
            'name' => $request->input('name'),
            'parent_id' => $request->input('parent_id'),
            'src' => $request->src,
            'icon' => $request->icon
        ];
        $isUpdate = $this->menu->find($id)->update($data);
        if ($isUpdate) {
            return redirect()->route('menu.list');
        }
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $isDelete = $this->menu->find($id)->delete();
        if($isDelete) {
            return redirect()->route('menu.list');

        }
    }
}
