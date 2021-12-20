<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function list(Request $request)
    {
            if(auth()->user()->type_user == 'nhan_vien' ){
            
                if(!isset($request->keyword)){
                    $users = User::where('type_user', 'nhan_vien')->where('status','true')->with(['criterias'=>function($query)
                    {
                    $query->wherePivot('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())->wherePivot('created_at', '<=', Carbon::now()->endOfMonth()->toDateString());
                    }])->get();
                    $month = now()->month;
    
                    $array = [];
                    $userPointNow = User::where('id', auth()->id())->where('status','true')->first();
                    if(isset($userPointNow)){
                        $relatedOrders = $userPointNow->criterias;
                        foreach($relatedOrders as $key){
                            if($key->pivot->created_at->month == $month){
                                array_push($array, $key);
                            }
                        }
                        $point = 0;
                        for ($i=0; $i<count($array); $i++){
                            $point +=  $array[$i]->point;
                        }
                    }else{
                        $point = 0;
                    }
    
                    return view('nhan_vien',compact('users','month','point'));
                }else{
                    $monthFind = substr($request->keyword, 0, 2);
    
                    $users = User::where('type_user', 'nhan_vien')->where('status','true')->with(['criterias'=>function($query)use($request)
                    {
                        $monthFind = substr($request->keyword, 0, 2);
                        $yearFind = substr($request->keyword, -4);
                        $firstDayOfMonth = '01';
                        $lastDayOfMonth = '31';
                    
                    $query->wherePivot('created_at', '>=', $yearFind.'-'.$monthFind.'-'.$firstDayOfMonth)->wherePivot('created_at', '<=', $yearFind.'-'.$monthFind.'-'.$lastDayOfMonth);
                    }])->get();
    
                    $month = $monthFind;
    
                    $array = [];
                    $userPointNow = User::where('id', auth()->id())->first();
                    $relatedOrders = $userPointNow->criterias;
                    foreach($relatedOrders as $key){
                        if($key->pivot->created_at->month == $month){
                            array_push($array, $key);
                        }
                    }
                    $point = 0;
                    for ($i=0; $i<count($array); $i++){
                        $point +=  $array[$i]->point;
                    }
    
                    return view('nhan_vien',compact('users','month','point'));
                }
                
            }else{
                if(!isset($request->keyword)){
                    $users = User::where('type_user', 'nhan_vien')->where('status','true')->with(['criterias'=>function($query)
                    {
                    $query->wherePivot('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())->wherePivot('created_at', '<=', Carbon::now()->endOfMonth()->toDateString());
                    }])->get();
                    $month = now()->month;
    
                    return view('quan_ly',compact('users','month'));
                }else{
                    $monthFind = substr($request->keyword, 0, 2);
    
                    $users = User::where('type_user', 'nhan_vien')->where('status','true')->with(['criterias'=>function($query)use($request)
                    {
                        $monthFind = substr($request->keyword, 0, 2);
                        $yearFind = substr($request->keyword, -4);
                        $firstDayOfMonth = '01';
                        $lastDayOfMonth = '31';
                    
                    $query->wherePivot('created_at', '>=', $yearFind.'-'.$monthFind.'-'.$firstDayOfMonth)->wherePivot('created_at', '<=', $yearFind.'-'.$monthFind.'-'.$lastDayOfMonth);
                    }])->get();
    
                    $month = $monthFind;
    
                    return view('quan_ly',compact('users','month'));
                }
            }
    }

    public function detail($month,$id){
        $thanhvien = User::where('id',$id)->first();
        $criteria = Criteria::get();
        $user= User::where('id',$id)->first();

        $array = [];
        $relatedOrders = $user->criterias;
        foreach($relatedOrders as $key){
            if($key->pivot->created_at->month == $month){
                array_push($array, $key);
            }
        }
        return view('pointdetail',compact('relatedOrders','criteria','user','array','thanhvien'));

    }
    
}
