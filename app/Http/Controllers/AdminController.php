<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Notifications\AdminActivityNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function adminindex()
    {

        $a = Customer::with('user')->latest('id')->paginate(10);

        return view('admin', compact('a'));
    }

    public function deleteappoint($id)
    {

        $a = Customer::findorfail($id);
        $a->delete();

        return back()->with('status', 'Deleted successfully!!!');

    }

    public function storeappoint(Request $req)
    {

        $type = $req->select;
        $phone = $req->phone;
        $date = $req->date;
        $massage = $req->massage;

        $app = new Customer;

        $app->user_id = auth()->id();
        $app->phone = $phone;
        $app->type = $type;
        $app->date = $date;
        $app->massage = $massage;

        $app->save();

        $admins = User::where('type', 'Admin')->get();

        Notification::send(
            $admins,
            new AdminActivityNotification(
                auth()->user()->name.' has new appointment "'.$app->type.'".',
                route('adminindex.show', $app->id)
            )
        );

        return back()->with('app_added', 'Your Appointment has been recorded successfylly, We will contact you soon!{{}}');
    }
}
