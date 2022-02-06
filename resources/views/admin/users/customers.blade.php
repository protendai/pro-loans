@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card p-2">
                <div class="card-header">
                    <h5 class="card-title">Customers Table</h5>
                </div>
                <table class="table table-striped datatable p-2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>National ID</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                        <tr>
                            <td>{{$row->name.' '.$row->surname}}</td>
                            <td>{{$row->national_id}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->email}}</td>
                            
                            <td class="table-action">
                                <a href="/customers/view/{{$row->user_id}}"><i class="align-middle" data-feather="edit-2"></i></a>
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

    

@endsection