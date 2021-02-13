<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminAuth extends Controller
{
    public function login()
    {

        return view('admin.auth.login');

    }//end function


    public function doLogin(Request $request)
    {


        $remember_me = $request->remember_me ? true : false;
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {

            return redirect(aurl());

        } else {

            session()->flash('error', trans('admin.incorrect_credentials'));
            return redirect()->back();
        }


    }//end function


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(aurl('login'));


    }//end function

    public function forgotPassword()
    {
        return view('admin.auth.forgot_password');

    }//end function

    public function setPassword(Request $request)
    {

        $admin = Admin::where('email', $request->email)->first();
        if (!empty($admin)) {

            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
            session()->flash('success', trans('admin.the_link_sent_successfully'));
            return back();
        }

        return redirect()->back();


    }//end function

    public function resetPassword($token)
    {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {

            return view('admin.auth.reset_password', compact('check_token'));
        } else {
            return redirect(aurl('forgot-password'));
        }

    }//end function

    public function setNewPassword($token)
    {


        $this->validate(request(), [

            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();


        if (!empty($check_token)) {

            $admin = Admin::where('email', $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt(request('password')),

            ]);
            DB::table('password_resets')->where('email', request('email'))->delete();
            admin()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
            return redirect(aurl());


        } else {
            return redirect(aurl('forgot-password'));
        }
    }

}//end function


