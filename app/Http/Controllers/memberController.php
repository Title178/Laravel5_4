<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Validator;
use App\Model\Member;
use App\Model\Position;


class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   // query buider join table
        //  $members = Member::join('positions','positions.id','=','members.position_id')->get(['members.*','positions.position_name']);

        // Eloquent Model
        $members = Member::orderBy('id','desc')->get();
      
        return view('member/index',compact('members'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $posotion = Position::orderBy('id','desc')->get();
        $posotions = [];
       foreach($posotion as $key => $value){
        $posotions[$value->id] = $value->position_name;
       }
    
       return  view('member/register',compact('posotions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255|email',
            'tel' => 'required',
            'position_id' => 'required|max:50',
            'username' => 'required|max:255|unique:members',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ],[
            'email.email'=>'รูปแบบ Email ไม่ถูกต้อง',
            'username.unique'=>'Username นี้ ชื่อมีผู้ใช้งานแล้ว',
            'password.min'=>'ระบุ รหัสผ่านขั้นต่ำ 6 ต้องตัวอักษร',
            'password.confirmed'=>'ยืนยันรหัสผ่านไม่ตรงกัน',
        ]);

        $request_all = $request->all();
        $new_pw = Hash::make($request->password);
        $request_all['password'] = $new_pw;
        //dd($request_all);

        if($validate->fails()){
           return redirect()->back()->withErrors($validate);
        }else {
            if(Member::create($request_all)) {
                $msg_alert = array('func'=>'success','title'=>'บันทึกข้อมูลเรียบร้อยแล้ว');
            }else {
                $msg_alert = array('func'=>'error','title'=>'ไม่สามารถบันทึกข้อมูลได้');
            }
            return redirect()->back()->with('msg_alert', $msg_alert);   
           
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
