@extends('master')
@section('content')
    <div class="card-header bg-cyan">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title text-bold mt-2">Operator List</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('oparetor_create' )}}" class="btn btn-primary"> Create New </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped datatable table-bordered">
                    <thead>
                    <tr style="background-color:#110c3b;color:white;font-size:18px;">
                        <th scope="col">SL</th>
                        <th scope="col">Floor Name</th>
                        <th scope="col">Line Name</th>
                        <th scope="col">Operator Name</th>
                        <th scope="col">Operator Salary</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($operators as $operator)
                        <tr style="background-color:#f5eded;">
                            <td>{{ $loop->iteration }}</td>
                            
                            <td>{{ $operator->floor->name?? ''}}</td>
                            <td>{{ $operator->line->name?? ''}}</td>

                            <td>{{ $operator->name ?? ''}}</td>
                            <td>{{ $operator->salary ?? ''}}</td>
                            <td>{{$operator->status ==1? 'Active' : 'InActive'}}</td>
                            <td>
                                @if($operator->status==0)
                                    <a href="{{ route('operator_status', $operator->id) }}" class="btn btn-sm btn-success p-1"
                                       title="Active"><span><i class="fas fa-check"></i></span></a>
                                @else
                                    <a href="{{ route('operator_status', $operator->id) }}" class="btn btn-sm btn-danger p-1"
                                       title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                                @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
