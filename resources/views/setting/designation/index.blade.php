@extends('master')
@section('content')
    <div class="card-header bg-cyan">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title text-bold mt-2">Buyer List</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('designation_add' )}}" class="btn btn-primary"> Create New </a>
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
                        <th scope="col">Designation Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($designations as $designation)
                        <tr style="background-color:#f5eded;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $designation->name?? ''}}</td>
                            <td>{{$designation->status ==1? 'Active' : 'InActive'}}</td>
                            <td>
                                @if($designation->status==0)
                                    <a href="{{ route('designationsStatus', $designation->id) }}" class="btn btn-sm btn-success p-1"
                                       title="Active"><span><i class="fas fa-check"></i></span></a>
                                @else
                                    <a href="{{ route('designationsStatus', $designation->id) }}" class="btn btn-sm btn-danger p-1"
                                       title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                                @endif
                                <a href="{{ route('designation_edit', $designation->id) }}" class="btn btn-sm btn-info p-1"
                                    title="Inactive"><span><i class="fas fa-edit"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
