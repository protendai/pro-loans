@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"></h5>

                </div>
                <div class="card-body">
                    <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Surname</label>
                                    <input type="text" class="form-control" name="surname" value="{{$user->surname}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="{{$user->role}}">{{$user->role}}</option>
                                        <option value="">-------------</option>
                                        <option value="SEC">Secretary</option>
                                        <option value="HOD">HOD</option>
                                        <option value="ST">Stores Person</option>
                                        <option value="AD">Administrator</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Department</label>
                                    <select class="form-control js-example-basic-single" name="department_id">
                                        <option value="{{$user->department->id}}">{{$user->department->dpt_name}}</option>
                                        @foreach ($departments as $row)
                                            @if ($row->id != $user->department->id)
                                                <option value="{{$row->id}}">{{$row->dpt_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">SAP Username</label>
                                    <input type="text" class="form-control" name="sap_username" value={{$user->sap_username}}>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">SAP Password</label>
                                    <input type="text" class="form-control" name="sap_password" value={{$user->sap_password}}>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="2">Disabled</option>
                                </select>
                            </div>
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