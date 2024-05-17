<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountAdmin;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use App\Models\Account;
use Illuminate\Support\Facades\Mail;

class LoginsAdminController extends Controller
{
    //
    public function index(){
        return view('logins.admin');
    }

    public function create(Request $request){
      if (Account::where('email', $request->email)->exists()) {
        // Redirect back with an error message
        return redirect()->back()->withErrors(['email' => 'Email đã tồn tại trong hệ thống.']);
    }
    if (AccountAdmin::where('email', $request->email)->exists()) {
        return redirect()->back()->withErrors(['email' => 'Email đã tồn tại trong hệ thống.']);
    }
      $account_admin = new AccountAdmin();
  
      $account_admin->name = request('username');
      $account_admin->email = request('email');
      $account_admin->password = Hash::make(request('password')) ;
      
      $account_admin->save();
      Mail::to($account_admin->email)->send(new WelcomeMail($account_admin));
      return redirect()->route('loginadmin');

    }


    
}
