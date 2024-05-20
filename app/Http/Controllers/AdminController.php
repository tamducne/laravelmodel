<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    
        public function index() {
            
                $accounts = Account::all(); // Adjust the number 10 to however many items you want per page
                return view('admin.user.index', compact('accounts'));
        
            
        }

        
}
