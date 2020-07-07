<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.home');
    }

    public function changePassword()
    {
        return view('admin.auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::id();
        $password = Auth::user()->password;

        $oldpass = $request->oldpass;
        $newpass = $request->password;
        $confirm = $request->password_confirmation;

        if (Hash::check($oldpass, $password)) {

            if ($newpass === $confirm) {
                $user = Admin::findorFail($id);
                $user->password = Hash::make($newpass);
                $user->save();

                Auth::logout();
                session()->flush();

                $notification = array(
                    'message' => 'Password has been updated successfully! Please login again.',
                    'alert-type' => 'success',
                );

                return redirect()->route('admin.login')->with($notification);

            } else {
                $notification = array(
                    'message' => 'Passwords do not match!',
                    'alert-type' => 'error',
                );

                return redirect()->back()->with($notification);
            }

        } else {

            $notification = array(
                'message' => 'Old password is incorrect!',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

    }
}
