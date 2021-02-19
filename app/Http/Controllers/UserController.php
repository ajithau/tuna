<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class UserController extends Controller
{

    public function index()
    {
        $users =  DB::table('users')
                                ->join('tasks','users.id','=','tasks.user_id')
                                ->select('users.*', DB::raw('group_concat(tasks.task) as task'), DB::raw('SUM(tasks.hours) as hours'))
                                ->groupBy('users.email')
                                ->get();
        return view('users.index',['userdata'=>$users]);

    }
    public function group_assoc($array, $key) {
        $return = array();
        foreach($array as $v) {
            $return[$v[$key]][] = $v;
        }
        return $return;
    }
    
    //Group the requests by their account_id

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile',compact('user',$user));
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('public/avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }
}