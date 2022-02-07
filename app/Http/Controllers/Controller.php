<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function loan_engine($data){

        $period     = $data['period'];
        $interest   = $data['interest'];
        $amount     = $data['amount'];
        $today      = $data['today'];
        
        // Accounting Formula :  repayment period * interest + amount + loan amount borrowed
        
        // Step  1  - Get the total interest rate by  :  repayment * interest %     = 0.5 
        $total_interest_perc = $period * ($interest / 100);
        // Step  2  - convert interest to $$$$$ using :  interest * amount   =  1000 this is the total interest
        $total_interest_amount = $total_interest_perc * $amount;
        // Step  3  - get the total amount to paid in 5 mothns  : amount + interest =  3000
        $total_loan_amount = $amount + $total_interest_amount;
        // Step  4  -  get amount to paid monthly  including interest : total_amount / repayment = $600 per month
        $monthly_payment_no_interest = $amount / $period;
        // Step  5  -  get monthly payment
        $total_monthly_payment  = $total_loan_amount / $period;

        // Do Date Calculations
        $first_payment_date = $today;
        $next_payment_date  = $this->get_next_date($first_payment_date);
        $last_payment_date  = $this->get_next_months($period,$first_payment_date);

        $data = [
            "total_amount"  => $total_loan_amount,
            "total_monthly" => $total_monthly_payment,
            "first_date"    => $first_payment_date,
            "next_date"     => $next_payment_date,
            "last_date"     => $last_payment_date,
        ];

        return $data;

    }

    public function get_next_date($payment_date){

        //Date issue to a given date.
        $date = new \DateTime($payment_date);
        //Create a new DateInterval object using P30D.
        $interval = new \DateInterval('P30D');
        //Add the DateInterval object to our DateTime object.
        $date->add($interval);
        //Print out the result.
        return  $date->format("Y-m-d");

    }

    function get_next_months($months,$today){
        // Add X months to current date to get the next date - month - day
		return date('Y-m-d', strtotime("+".$months." months", strtotime($today)));
    }
    
    public function get_days_over($payment_date,$next_payment){

        $now        = strtotime($payment_date);
        $your_date  = strtotime($next_payment);
        $datediff   = $now - $your_date;
        $days_over  = round($datediff / (60 * 60 * 24));
        
        if($days_over < 1){ $days_over = 0; }

        return $days_over;
    }

}
