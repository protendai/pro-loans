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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payment-modal">Record Payment</button>
                </div>
                <form action="">
                    <div class="card-body">

                       
                        

                    </div>
                    <div class="card-footer">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Record Payment</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="modal-body m-3">
                        <div class="form-group">
                            <label for="">Loan Number</label>
                            <input type="text" class="form-control" name="loan_number" value="{{$loan->loan_number}}" readonly>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="">Payment Method</label>
                            <select class="form-control" name="payment_method">
                                <option value="Bank">Bank</option>
                                <option value="Cash">Cash</option>
                                <option value="Online">Online</option>
                            </select>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="">Reference Number</label>
                            <input type="text" class="form-control" name="payment_reference">
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="">Amount Paid</label>
                            <input type="text" class="form-control" name="amount_paid" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection