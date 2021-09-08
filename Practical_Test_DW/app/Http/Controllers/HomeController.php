<?php

namespace App\Http\Controllers;

use App\Models\warehouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function add(){
        return view('add');
    }

    public function wareHouse(Request $request){
        $request ->validate([
            'id_name'=>'required',
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);
        $request->input('id_name');
        $request->input('name');
        $request->input('price');
        $request->input('image');

        warehouse::create($request->all());
        return redirect('/')
            ->with('success','Bạn đã thêm dữ liệu thành công.');
    }
    public function getDashboard()
    {
        $warehouse = warehouse::all();
        return view('index', compact('warehouse'));
    }

}
