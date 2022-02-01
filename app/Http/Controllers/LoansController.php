<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoansController extends Controller
{
    public function index(){
        $title = "Loans";
        return view('admin.loans.index',compact('title'));
    }
}
