@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card p-2">
                <div class="card-header">
                    <h5 class="card-title">Customer Profile Details</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Customer</label>
                                <input type="text" class="form-control" value="{{$user->name.' '.$user->surname}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="loan_number" value="{{$user->email}}" readonly>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" value="{{$user->phone}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">National ID</label>
                                    <input type="text" class="form-control" value="{{$user->national_id}}" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Province</label>
                                    <input type="text" class="form-control" value="{{$user->province}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">District</label>
                                    <input type="text" class="form-control" value="{{$user->district}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" value="{{$user->address}}" readonly>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h5>Customer documents</h5>
                            <a href="/download/{{$user->copy_national_id}}">Copy of national ID</a><hr/>
                            <a href="/download/{{$user->copy_residence}}">Proof of residence</a><hr/>
                            <a href="/download/{{$user->copy_bank}}">Bank Statement</a>
                            <hr/>
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-message">
                                    <strong>Notice!</strong> 
                                    If you are satisfied by the customer's documents , please activate their account
                                    <br/>
                                </div>
                            </div>
                            <a href="/customer/activate/{{$user->user_id}}" class="btn btn-primary">Activate Customer</a>

                        </div>
                    </div>

                </div>

                <div class="card-footer">

                </div>
                
            </div>
        </div>
    </div>

  

    

@endsection