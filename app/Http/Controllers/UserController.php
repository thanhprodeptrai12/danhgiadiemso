<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        $user = User::where('type_user','nhan_vien')->get();
        return view('user',compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return back()->with('suscess', 'Đã sửa thành công');
    }

    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('suscess', 'Đã them thành công');
    }

    public function hide($id)
    {
        $user = User::find($id);
        $user->status = 'false';

        $user->save();
        return back()->with('suscess', 'Đã xóa thành công');
    }

    public function public($id)
    {
        $user = User::find($id);
        $user->status = 'true';

        $user->save();
        return back()->with('suscess', 'Đã xóa thành công');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->criterias()->detach();

        $user->delete();

        return back()->with('suscess', 'Đã xóa thành công');
    }
}
