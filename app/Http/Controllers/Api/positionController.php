<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
use App\Model\Position;
use Validator;
use Illuminate\Validation\Rule;

class positionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        return response()->json($positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'position_name' => 'required|max:255|unique:positions',
            'company_id'=>'max:1',
        ],[
            'position_name.required'=>'Input Position_name',
            'position_name.unique'=>'Duplicate Name Position. Please use name another.',
        ]);

        if($validator->fails()) { // ถ้าไม่ผ่าน
            $error = array('error'=>$validator->messages());
            return response()->json($error);
        }else {
            $position_name = trim($request->position_name); // ค่า post จาก api
            $position = new Position;
            $position->position_name = $position_name; // กำหนดให้ฟิวใน table
            $position->company_id = '1';

            if($position->save()) {
                return response()->json(['status'=>'Success','msg'=>'Create Success']);
            }else {
                return response()->json(['status'=>'Success','msg'=>'Create Fail !']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        if($position) {
            $position['status']='success';
            return response()->json($position);
        }else {
            return response()->json(['msg'=>'ไม่มีข้อมูล']);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // แบบเงื่อนไขพิเศษเช็คในฟิวดิ์อื่น ๆ ของ table ได้
        // $arr_rule_edit = [
        //     'position_name' => ['required','max:255',Rule::unique('positions')->where(function($query) use ($id,$request){ // ระบุตัวแปรที่จะเอาไปใช้ใน function
        //         $query->where('id','!=',$id);
        //     })],
        //      'company_id'=> 'max:1',
        // ];
        $arr_rule_edit = [
            'position_name' => ['required','max:255',
             Rule::unique('positions')->ignore($id)], //ไม่เช็ค unique ใน $id ที่กำหนด
             'company_id'=> 'max:1',
        ];
        $validator = Validator::make($request->all(),
        $arr_rule_edit ,[
            'position_name.required'=>'Input Position_name',
            'position_name.unique'=>'Duplicate Name Position. Please use name another.',
        ]);
        
        if($validator->fails()) { // ถ้าไม่ผ่าน
            $error = array('error'=>$validator->messages());
            return response()->json($error);
        }else {
 
            $position_name = trim($request->position_name);
            $position = Position::find($id);
            if($position) {
                $position['position_name']=$position_name;

                if($position->save()) {
                    return response()->json(['status'=>'Success','msg'=>'Update Success']);
                }else {
                    return response()->json(['status'=>'error','msg'=>'Can Not Edit']);
                }
            }else {
                return response()->json(['status'=>'error','msg'=>'Not Have ID']);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        if($position){  
            if($position->delete()) {
                return response()->json(['status'=>'Success','msg'=>'Delete Success','data_delete'=>$position]);
            }else{
                return response()->json(['status'=>'error','msg'=>'Can not delete !']);
            }
        }else {
            return response()->json(['status'=>'error','msg'=>'Not Have ID Selector']);
        }
    }
}
