<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Position;



class positionsController extends Controller
{
    // Start
    function index() {
        $positions = Position::orderBy('id','desc')->get();
        return view('position',compact('positions'));
    }

    // บันทึกข้อมูล
     function store(Request $request) {
       
        $this->validate($request,[
            'position_name'=>'required',
            'company_id'=>'required'
        ]);
        
        Position::create($request->all());
        return redirect()->back(); 

        // $positions = Position::orderBy('id','desc')->get();
        // return view('position',compact('positions','validator'));
    }
    
}
