<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CriteriaController extends Controller
{
    public function list(){
        $criteria = Criteria::get();
        return view('criteria',compact('criteria'));
    }

    public function update(Request $request)
    {
        $criteria = Criteria::find($request->id);
        $criteria->name = $request->name;
        $criteria->point = $request->point;

        $criteria->save();
        return Redirect::back()->withSuccess('Đã sửa thành công');

    }

    public function store(Request $request)
    {
        $criteria = new Criteria();

        $criteria->name = $request->name;
        $criteria->point = $request->point;
        $criteria->created_at = Carbon::now('Asia/Ho_Chi_Minh');

        $criteria->save();

        return Redirect::back()->withSuccess('Đã them thành công');
    }

    public function delete($id)
    {
        $criteria = Criteria::find($id);

        $criteria->users()->detach();

        $criteria->delete();

        return Redirect::back()->withFail('Đã xoa thành công');
    }
}
