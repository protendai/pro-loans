@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Loan Details</h5>
                </div>
                <form action="/loans/approve" method="POST">
                @csrf
                <div class="card-body">
                    
                        <div class="form-group">
                            <label for="">Customer</label>
                            <input type="text" class="form-control" value="{{$loan->name.' '.$loan->surname}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Loan Number</label>
                            <input type="text" class="form-control" name="loan_number" value="{{$loan->loan_number}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Amount Borrowed</label>
                            <input type="text" class="form-control" value="{{$loan->amount_borrowed}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Loan Interest</label>
                            <input type="text" class="form-control" value="{{$loan->interest}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Monthly Payment</label>
                            <input type="text" class="form-control" value="{{$loan->total_repayment / $loan->period}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Total Payment</label>
                            <input type="text" class="form-control" value="{{$loan->total_repayment}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Last Payment Date</label>
                            <input type="date" class="form-control" value="{{$loan->date_due}}" readonly>
                        </div>
                        <hr/>
    
                    <div class="card-footer">
                        @if($loan->loan_status < 1)
                            <a href="loans/cancel/{{$loan->loan_number}}" class="btn btn-danger">Reject Loan</a>
                            <button type="submit" class="btn btn-primary float-right">Approve Loan</button>
                        @endif
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Repayment Details</h5>
                </div>
                <form action="">
                    <div class="card-body">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection