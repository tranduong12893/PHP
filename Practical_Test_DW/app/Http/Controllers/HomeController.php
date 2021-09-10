<?php

namespace App\Http\Controllers;

use App\Models\warehouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function wareHouse(Request $request){
        $request ->validate([
            'id_name'=>'required',
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);

        warehouse::create($request->all());
        return redirect()->route('index')
            ->with('success','Bạn đã thêm dữ liệu thành công.');
    }
    public function getDashboard()
    {
        $warehouse = warehouse::all();
        return view('index', compact('warehouse'));
    }

}
