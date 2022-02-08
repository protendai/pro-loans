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

        $payments = LoanRepayment::where('loan_number',$id)->get();

        return view('admin.loans.view',compact('title','loan','payments'));
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

    public function apply(Request $request){
        // Add loan application
        $loans = Loan::orderby('loan_number', 'desc')->first();
        $interest = 10;

        if($loans){
            $current_loan = $loans->loan_number;
            $current_loan +=1;
        }else{
            $current_loan = 1000;
        }

        
        $loan = Loan::create([
            'loan_number'       =>$current_loan,
            'user_id'           =>Auth::user()->id,
            'period'            =>$request->duration,
            'amount_borrowed'   =>$request->amount,
            'interest'          =>$interest,
            'total_repayment'   =>null,
            'date_application'  =>null,
            'date_approval'     =>null,
            'date_payment'      =>null,
            'date_due'          =>null,
            'loan_status'       =>0,
        ]);


        if($loan){
            return back()->with('success','Loan application complete');
        }else{
            return back()->with('error','Operation failed '.$loan);
        }

    }


    // Repayment Methods
    public function repayment_store(Request $request){
        $loan_number    = $request->loan_number;
        $amount_paid    = $request->amount_paid;
        $payment_date   = date('Y-m-d');
        $payment_method = $request->payment_method;
        $payment_ref    = $request->payment_ref;

        // Get loan details
        $loan = Loan::where('loan_number',$loan_number)->first();
        $repayments = LoanRepayment::where('loan_number',$loan_number)->orderby('created_at','desc')->first();
        $total_paid = LoanRepayment::where('loan_number',$loan_number)->sum('total_paid');
        // Sort out dates
        $next_payment = $this->get_next_date($payment_date);

        if($repayments){
            $first_date = $repayments->date_first_payment;
            $balance = $repayments->balance;
        }else{
            $first_date = $payment_date;
            $balance = $loan->total_repayment;
        }
        // save payment details
        $pay = LoanRepayment::create([
            'loan_number'           =>$loan_number,
            'payment_method'        =>$payment_method,
            'payment_ref'           =>$payment_ref,
            'amount_paid'           =>$amount_paid,
            'monthly_payment'       =>$loan->total_repayment / $loan->period,
            'total_amount'          =>$loan->total_repayment,
            'total_paid'            =>$total_paid + $amount_paid,
            'balance'               =>$balance - $amount_paid,
            'date_first_payment'    =>$first_date,
            'date_next_payment'     =>$next_payment,
        ]);


        // update main loan details
        $balance = $loan->total_repayment - ($total_paid + $amount_paid);
        if($balance == 0 ){
            $update = Loan::where('loan_number',$loan_number)
            ->update([
                'loan_status'=>2
            ]);  
        }
        $update = Loan::where('loan_number',$loan_number)->update(['date_payment'=>$next_payment]);


        if($pay){
            return back()->with('success','Loan payment recorded');
        }else{
            return back()->with('error','Operation failed 1: Payment '.$pay);
        }



    }

}
