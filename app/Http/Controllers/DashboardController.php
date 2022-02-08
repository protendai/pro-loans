<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\LoanRepayment;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $details = null;

        $approved_loans = Loan::where('loan_status',1)->count();
        $pending_loans  = Loan::where('loan_status',0)->count();
        $issued_loans   = Loan::where('loan_status',1)->sum('total_repayment');
        $paid_loans     = LoanRepayment::sum('total_paid');


        if(Auth::user()->role =='CU'){
            $approved_loans = Loan::where('loan_status',1)->where('user_id',Auth::user()->id)->count();
            $pending_loans  = Loan::where('loan_status',0)->where('user_id',Auth::user()->id)->count();
            $issued_loans   = Loan::where('loan_status',1)->where('user_id',Auth::user()->id)->sum('total_repayment');
            $paid_loans     = LoanRepayment::sum('total_paid');

            $paid_loans     = DB::table('loans')
            ->join('loan_repayments','loan_repayments.loan_number','=','loans.loan_number')
            ->where('loans.user_id',Auth::user()->id)
            ->sum('loan_repayments.total_paid');

            //dd($paid_loans);

            $details = Customer::where('user_id',Auth::user()->id)->first();
        }
       
        return view('admin.dashboard.index',compact('title','details','approved_loans','pending_loans','issued_loans','paid_loans'));
    }
}
