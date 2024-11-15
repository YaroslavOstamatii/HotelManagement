<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()){
            $userType = Auth::user()->user_type;
            if ($userType === 'user'){
                return view('dashboard');
            }
            elseif ($userType === 'admin'){
                return view('admin.index');
            }
            else return redirect()->back();
        }
    }
}
