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
   
 public function updaterole(Request $request)
{
    // ۱. اعتبارسنجی دقیق داده‌های ورودی
    $validated = $request->validate([
        'id'   => 'required|exists:users,id', // مطمئن می‌شویم کاربر وجود دارد
        'name' => 'required|string|max:255',
        'type' => ['required', Rule::in(['Admin', 'User', 'Customer'])], // فقط نقش‌های مجاز (این لیست را بر اساس سیستم خود تغییر دهید)
    ]);

    // ۲. پیدا کردن کاربر با ID معتبر
    $user = User::findOrFail($validated['id']);

    // ۳. بروزرسانی اطلاعات
    $user->name = $validated['name'];
    $user->type = $validated['type'];
    $user->save();

    // ۴. بازگشت به صفحه قبل با کلید سشن اصلاح شده (user_edit)
    return redirect()->back()->with('user_edit', 'کاربر با موفقیت بروزرسانی شد.');
}

    public function deleteuser($id){

    $user=User::find($id);
    $user->delete();
    return back()->with('delete.user','کاربر با موفقیت حذف شد');
    }

}
