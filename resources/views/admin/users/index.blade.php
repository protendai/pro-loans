@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card p-2">
                <div class="card-header">
                    <h5 class="card-title"></h5>
                    <button class="btn btn-primary btn-md float-right" data-toggle="modal" data-target="#create-modal">Create User</button>
                    <button class="btn btn-primary btn-md float-right mr-2" data-toggle="modal" data-target="#upload-modal">Create Bulk</button>
                </div>
                <table class="table table-striped datatable p-2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name.' '.$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->created_at}}</td>
                            <td class="table-action">
                                <a href="{{ route('users.edit',$user->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="modal-body m-3">
                        
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                                <input type="hidden" class="form-control" name="password" value="12345678">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Surname</label>
                                <input type="text" class="form-control" name="surname">
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Role</label>
                                <select class="form-control" name="role">
                                    <option value="AD">Administrator</option>
                                    <option value="LO">Loan Officer</option>
                                    <option value="CU">Customer</option>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <div class="form-group ">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
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

    {{-- Upload Bulk --}}
    <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Users</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/users/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="modal-body m-3">
                        
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-message">
                                <strong>Notice!</strong> Upload excel with a format as shown below
                            </div>
                        </div>
                        <div class="row">
    
                            <div class="col-md-12 mb-2 mt-2">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Username/UserCode</th>
                                        <th>Password</th>
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    
                                </table>
                            </div>
    
                            <div class="form-group col-md-12">
                                <label for="">Select File to Upload</label><br/>
                                <input type="file" id="file" name="file" accept=".xls,.xlsx" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection