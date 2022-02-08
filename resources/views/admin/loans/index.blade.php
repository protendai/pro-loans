@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"></h5>
                <button type="button" class="btn btn-primary btn-md float-right"  data-toggle="modal" data-target="#apply-modal">Apply Loan</button>
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
                        <td>$ @convert($row->amount_borrowed)</td>
                        <td>@convert($row->interest) %</td>
                        <td>{{$row->period}} Months</td>
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


    <div class="modal fade" id="apply-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quickly Apply</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/loans/apply" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="modal-body m-3">
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name.' '.Auth::user()->surname}}">
                               
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Duration (Months)</label>
                                <input type="number" class="form-control" name="duration">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Amount</label>
                                <input type="nuber" class="form-control" name="amount" min="100" max="5000">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Quick Apply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection