@extends('layouts.app')

@section('content')

@if(Auth::user()->role=='CU')
    @if($details->status != 1)
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>Account not activated</h4>
                </div>
                <div class="card-body">

                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        <div class="alert-message">
                            <strong>Notice!</strong> 
                                Please upload the following documents : Copy of national ID , Proof of residence & Bank statement
                            <br/>
                        </div>  
                    </div>

                    <form action="/profile/customer" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Enter National ID</label>
                                        <input type="text" class="form-control" name="national_id" value="{{$details->national_id}}" pattern="[1-9]{2}-[0-9]{6,7}-[A-Z]{1}[0-9]{2}" maxlength="25" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$details->phone}}" pattern="[0]{1}[7]{1}[1-7]{1}[1-9]{1}[0-9]{6}" maxlength="12" required>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="">Upload a copy of your national ID</label>
                                    <input type="file" class="form-control" name="copy_national_id" accept=".pdf" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                               
                                <div class="form-group">
                                    <label for="">Upload Proof of Residence</label>
                                    <input type="file" class="form-control" name="copy_residence" accept=".pdf"  required>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label for="">Upload Copy of bank Statement</label>
                                    <input type="file" class="form-control" name="copy_bank_statement" accept=".pdf"   required>
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    @endif
@endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Account Details</h3>
                </div>
                <form action="/profile/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Surname</label>
                                <input type="text" class="form-control" name="surname" value="{{$user->surname}}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Role</label>
                                <select class="form-control" name="role" disabled>
                                    <option value="{{$user->role}}">{{$user->role}}</option> 
                                </select>
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>
                        </div>
                        <hr/>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection