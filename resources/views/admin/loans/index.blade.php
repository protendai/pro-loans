@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"></h5>
                <a href="/sync/suppliers" class="btn btn-primary btn-md float-right" >Apply Loan</a>
            </div>
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>Loan Number</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Interest</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $row)
                    <tr>
                        <td>{{$row->loan_number}}</td>
                        <td>{{$row->name.' '.$row->surname}}</td>
                        <td>{{$row->amount_borrowed}}</td>
                        <td>{{$row->interest}}</td>
                        <td>{{$row->period}}</td>
                        <td>
                            @if($row->loan_status == 0) 
                                <span class="badge bg-primary">Pending</span>
                            @elseif($row->loan_status == 1)
                                <span class="badge bg-warning">In Progress</span>
                            @elseif($row->loan_status == 2)
                                <span class="badge bg-success">Paid Up</span>
                            @else  
                                <span class="badge bg-warning">Cancelled</span>
                            @endif
                        </td>
                        <td class="table-action">
                            @if($row->loan_status > 0)
                                <a href="/loans/view/{{$row->loan_number}}" class="btn btn-primary"><i style="color:#fff;">View</i></a>
                            @else 
                                @if(Auth::user()->role !="CU") 
                                <a href="/loans/view/{{$row->loan_number}}"><i class="align-middle" data-feather="edit-2"></i></a>
                                @endif
                                <a href="/loans/cancel/{{$row->loan_number}}"  title="Cancel Loan"><i class="align-middle" data-feather="minus-circle"></i></a>
                                <a href="#" title="Waiting for approval"><i class="align-middle" data-feather="eye-off"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection