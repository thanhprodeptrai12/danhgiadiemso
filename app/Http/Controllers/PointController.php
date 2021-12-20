<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\User;
use App\Models\User_Criteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PointController extends Controller
{
    public function list(){
        $users = User::where('type_user', 'nhan_vien')->with(['criterias'=>function($query)
                {
                $query->wherePivot('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())->wherePivot('created_at', '<=', Carbon::now()->endOfMonth()->toDateString());
                }])->get();
                $month = now()->month;
        return view('point',compact('users'));
    }

    public function detail(Request $request, $id){
        //carbon
        $monthNow = Carbon::now()->month;

        $criteria = Criteria::get();
        $user= User::where('id',$id)->first();

        $array = [];
        $relatedOrders = $user->criterias;
        foreach($relatedOrders as $key){
            if($key->pivot->created_at->month == $monthNow){
                array_push($array, $key);
            }
        }
        return view('pointdetail',compact('relatedOrders','criteria','user','array'));
    }

    public function update(Request $request){
        $pivot = User_Criteria::find($request->pivot_id);
        $pivot->created_at = $request->created_at;

        $pivot->save();
        return Redirect::back()->withSuccess('Đã sửa thành công');
    }

    public function store(Request $request){
        $point = new User_Criteria();
        $point->criteria_id= $request->criteria;
        $point->user_id= $request->id;
        $point->note= $request->note;
        $point->created_at=$request->date;

        $point->save();

        return Redirect::back()->withSuccess('Đã them thành công');
    }

    public function delete($id)
    {
        $point = User_Criteria::find($id);
        $point->delete();
        return Redirect::back()->withFail('Đã xoa thành công');
    }
}
