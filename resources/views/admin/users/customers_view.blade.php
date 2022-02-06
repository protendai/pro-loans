@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card p-2">
                <div class="card-header">
                    <h5 class="card-title">Customer Profile Details</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>

                <div class="card-footer">

                </div>
                
            </div>
        </div>
    </div>

  

    

@endsection