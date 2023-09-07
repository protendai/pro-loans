@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"></h5>

                </div>
                <div class="card-body">
                    <form action="/users/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" pattern="[a-zA-Z].{3,25}" maxlength="15" required value="{{$user->name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Surname</label>
                                    <input type="text" class="form-control" name="surname" pattern="[a-zA-Z].{3,25}" maxlength="15" required  value="{{$user->surname}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="{{$user->role}}">{{$user->role}}</option>
                                        <option value="">-------------</option>
                                        <option value="AD">Administrator</option>
                                        <option value="LO">Loan Officer</option>
                                        <option value="CU">Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" maxlength="50" required>
                                </div>
                                
                            </div>                           
                        </div>
                        <div class="modal-footer">
                            <a href="/users/delete/{{$user->id}}" class="btn btn-danger float-left">Delete User</a>
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
                    <form action="/password/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PATCH') --}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Update Password</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="password">
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