<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\LoanRepayment;

class LoansController extends Controller
{
    public function index(){
        $title = "Loans";
        if(Auth::user()->role == "CU"){
           
            $loans = DB::table('loans')
            ->join('customers','customers.user_id','=','loans.user_id')
            ->join('users','users.id','=','customers.user_id')
            ->where('loans.user_id',Auth::user()->id)
            ->get();

        }else{

            $loans = DB::table('loans')
            ->join('customers','customers.user_id','=','loans.user_id')
            ->join('users','users.id','=','customers.user_id')
            ->get();

        }
        //dd($loans);
        return view('admin.loans.index',compact('title','loans'));
    }

    public function show($id){
        $title = "Loans";
    
        $loan = DB::table('loans')
            ->join('customers','customers.user_id','=','loans.user_id')
            ->join('users','users.id','=','customers.user_id')
            ->where('loans.loan_number',$id)
            ->first();

        return view('admin.loans.view',compact('title','loan'));
    }

    public function cancel($id){
        $update = Loan::where('loan_number',$id)->update(['status',3]);
        if($update){
            return back()->with('success','Loan cancelled');
        }else{
            return back()->with('error','Operation failed '.$update);
        }
        
    }

    public function store(Request $request){
        // Get Loan
        $loan = Loan::where('loan_number',$request->loan_number)->first();
        // Get Customer Details
        $customer =  Customer::where('user_id',$loan->user_id)->first();
        
        if($customer->status == 0){
            return back()->with('error','Customer profile has not been activated');
        }

        $data = [
            "period"    =>$loan->period,
            "interest"  =>$loan->interest,
            "amount"    =>$loan->amount_borrowed,
            "today"     =>date('Y-m-d')
        ];

        $resp = $this->loan_engine($data);
        $resp = (object)$resp;
        // Update DB
        $update = Loan::where('loan_number',$loan->loan_number)
        ->update([
            'total_repayment'   =>$resp->total_amount,
            'date_application'  =>$loan->created_at,
            'date_approval'     =>date('Y-m-d'),
            'date_payment'      =>$resp->next_date,
            'date_due'          =>$resp->last_date,
            'loan_status'            =>1,
        ]);

        if($update){
            return back()->with('success','Loan approved');
        }else{
            return back()->with('error','Operation failed '.$update);
        }
    }
}
