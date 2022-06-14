<?php


namespace Tuanh\User\Controllers\Test;


use Illuminate\Http\Request;

class TestController extends \App\Http\Controllers\Controller{

    /** test package
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        return view("user::test.index");
    }

}
