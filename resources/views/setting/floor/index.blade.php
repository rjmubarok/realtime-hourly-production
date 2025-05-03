@extends('master')
@section('content')
<div class="card-header bg-cyan">
    <div class="row">
        <div class="col-md-6">
            <h3 class="card-title text-bold mt-2">Floor List</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route('floorSetup' )}}" class="btn btn-primary"> Create New </a>
        </div>
    </div>
</div>
<div class="card-body">
    @if(\Illuminate\Support\Facades\Auth::user()->user_type ==1)
    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped datatable table-bordered">
                <thead>
                    <tr style="background-color:#110c3b;color:white;font-size:18px;">
                        <th scope="col">SL</th>
                        <th scope="col">Floor Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($floor_admins as $floor)
                    <tr style="background-color:#f5eded;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $floor->name?? ''}}</td>
                        <td>{{$floor->status ==1? 'Active' : 'InActive'}}</td>
                        <td>
                            <a href="{{ route('floor_edit', $floor->id) }}" class="btn btn-sm btn-info p-1"
                                title="Edit"><i class="fas
                                fa-edit"></i></a>
                            @if($floor->status==0)
                            <a href="{{ route('floor_status', $floor->id) }}" class="btn btn-sm btn-success p-1"
                                title="Active"><span><i class="fas fa-check"></i></span></a>
                            @else
                            <a href="{{ route('floor_status', $floor->id) }}" class="btn btn-sm btn-danger p-1"
                                title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else

    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped datatable table-bordered">
                <thead>
                    <tr style="background-color:#110c3b;color:white;font-size:18px;">
                        <th scope="col">SL</th>
                        <th scope="col">Floor Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($floors as $floor)
                    <tr style="background-color:#f5eded;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $floor->name?? ''}}</td>
                        <td>{{$floor->status ==1? 'Active' : 'InActive'}}</td>
                        <td>

                            @if($floor->status==0)
                            <a href="{{ route('floor_status', $floor->id) }}" class="btn btn-sm btn-success p-1"
                                title="Active"><span><i class="fas fa-check"></i></span></a>
                            @else
                            <a href="{{ route('floor_status', $floor->id) }}" class="btn btn-sm btn-danger p-1"
                                title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

@endsection
