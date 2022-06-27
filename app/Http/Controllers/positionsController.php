<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Position;

use Validator;
use Illuminate\Validation\Rule;



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
            'position_name'=>'required|unique:positions',
            'company_id'=>'required'
        ],positionsController::errorMessage());
        // เมื่อ validate ไม่ผ่านจะ auto redirect ไปหน้า form ทันที
        
        if(Position::create($request->all())) { // ถ้าบันทึกผ่าน (บันทึกตามฟิวใน Model)
            $msg_alert = array('func'=>'success','title'=>'บันทึกข้อมูลเรียบร้อยแล้ว');
            
        }else {
            $msg_alert = array('func'=>'error','title'=>'ไม่สามารถบันทึกข้อมูลได้');
        }
         return redirect()->back()->with('msg_alert', $msg_alert);   

        
    }
    
    // ฟอร์มแก้ไข
    function edit($id) {
      $position = Position::find($id);
      return view('position_edit',compact('position'));
    }

    // Update ข้อมูล
    function update(Request $request,$id) {
        unset($request['_method']);
        unset($request['_token']);
        
        $arr_rule_edit = [
            'position_name' => ['required','max:255',
             Rule::unique('positions')->ignore($id)], //ไม่เช็ค unique ใน $id ที่กำหนด
             'company_id'=> 'max:1',
        ];
        $validator = Validator::make($request->all(),
        $arr_rule_edit ,
        positionsController::errorMessage());

        if($validator->fails()) { // ถ้าไม่ผ่าน
            return redirect()->back()->withErrors($validator);
        }else {
            if(Position::whereId($id)->update($request->all())) { // Update adn chechk success
                $msg_alert = array('func'=>'success','title'=>'แก้ไขข้อมูลเรียบร้อยแล้ว');
            }else {
                $msg_alert = array('func'=>'error','title'=>'ไม่สามารถแก้ไขข้อมูลได้');
            }
            return redirect('/positions')->with('msg_alert', $msg_alert);
        }
    }

    // Delete 
    function destroy($id) {
        $position = Position::find($id);
        if($position->delete()) {
            $msg_alert = array('func'=>'success','title'=>'ลบข้อมูลเรียบร้อยแล้ว');
        }else {
            $msg_alert = array('func'=>'error','title'=>'ไม่สามารถลบข้อมูลได้');
        }
        return redirect('/positions')->with('msg_alert', $msg_alert);
    }
    
    public function errorMessage() {
        return [
            'position_name.required'=>'กรุณากรอก Position Name',
            'position_name.unique'=>'Position Name ห้ามซ้ำ',
            'company_id.required'=>'กรุณากรอก Company id'                          
        ];
    }

}