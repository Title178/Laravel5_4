<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\apiAcount;

class ckeckApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token_request = $request->input('token'); // รับค่าพารามิเตอร์
        $account = apiAcount::where('token_api',$token_request)->get();
    
        if($account->count()>0) {
           
            return $next($request); // ผ่าน Middle Ware ไปได้ 
        }else {
           // echo " Middle ware Not Condition !";
            return response()->json(['msg'=>'คุณไม่มีสิทธิเข้าถึงข้อมูล']);
            exit();
        }
        
    }
}
