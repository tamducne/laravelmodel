<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Mail\WelcomeMail;
use App\Models\AccountAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;


class LoginsController extends Controller
{
    //
    public function index()
    {
        return view('logins.index');
    }

    public function create(Request $request)
    {
        if (Account::where('email', $request->email)->exists()) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['email' => 'Email đã tồn tại trong hệ thống.']);
        }
        if (AccountAdmin::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email đã tồn tại trong hệ thống.']);
        }


        $account = new Account();
        $account->name = request('username');
        $account->email = request('email');
        $account->password = Hash::make(request('password'));
        $account->save();





        Mail::to($account->email)->send(new WelcomeMail($account));


        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        
        $email =  $request->email;
        $password = $request->password;

        if (Auth::guard('accounts')->attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            // Đăng nhập thành công
            dd(Auth::guard('accounts')->user());
            return redirect()->intended('account-dashboard');
        } else {
            // Đăng nhập thất bại
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput();
            }    
    }
}
