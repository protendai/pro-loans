<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $details = null;

        if(Auth::user()->role =='CU'){

            $details = Customer::where('user_id',Auth::user()->id)->first();
        }
       
        return view('admin.dashboard.index',compact('title','details'));
    }
}
