<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function allusers(){
      
        $user=User::paginate(10);
        return view('user.userlist',compact('user'));

    }

    public function edituser($id)
    {
       $user=User::find($id);
    return view('user.userrole',compact('user'));

    }
   
    public function updaterole(Request $request){
         $user = User::findOrFail($request->input('id'));


           $user->name = $request->input('name');
           $user->type = $request->input('type');

             $user->save();
           return redirect()->back()->with('user_adit', 'کاربر با موفقیت بروزرسانی شد.');
    }

    public function deleteuser($id){

    $user=User::find($id);
    $user->delete();
    return back()->with('delete.user','کاربر با موفقیت حذف شد');
    }

}
