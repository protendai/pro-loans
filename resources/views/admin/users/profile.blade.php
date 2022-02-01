@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"></h5>

                </div>
                <div class="card-body">
                    <form action="/profile/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                    <label for="">Department</label>
                                    <input type="text" class="form-control" name="department" value="{{$user->department->dpt_name}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required>
                                </div>
                            </div>
                            <hr/>
                           
                            @if(Auth::user()->role != "SEC")
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">SAP Username</label>
                                    <input type="text" class="form-control" name="sap_username" value="{{$user->sap_username}}" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">SAP Password</label>
                                    <input type="text" class="form-control" name="sap_password" value="{{$user->sap_password}}" readonly>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"></h5>

                </div>
                <div class="card-body">
                    <form action="/profile/password" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PATCH') --}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Current Password</label>
                                    <input type="text" class="form-control" name="c_password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">New Password</label>
                                    <input type="text" class="form-control" name="n_password">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection