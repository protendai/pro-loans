@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"></h5>
                    <a href="/sync/suppliers" class="btn btn-primary btn-md float-right" >Sync Suppliers</a>
                </div>
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier Code</th>
                            <th>Supplier Name</th>
                            <th>Supplier Type</th>
                            <th>Group Code</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->cardCode}}</td>
                            <td>{{$row->cardName}}</td>
                            <td>{{$row->cardType}}</td>
                            <td>{{$row->groupCode}}</td>
                            <td>
                                @if($row->cardStatus == 0) 
                                    <span class="badge bg-danger">UnAvailable</span>
                                @elseif($row->cardStatus == 1)
                                    <span class="badge bg-success">Available</span>
                                @else  
                                    <span class="badge bg-warning">In Sync</span>
                                @endif
                            </td>
                            <td class="table-action">
                                <a href="{{ route('suppliers.show',$row->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection