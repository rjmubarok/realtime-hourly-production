@extends('master')
@section('content')
    <div class="card-header bg-cyan">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title text-bold mt-2">Size List</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('sizeSetup' )}}" class="btn btn-primary"> Create New </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped datatable table-bordered">
                    <thead>
                    <tr style="background-color:#110c3b;color:white;font-size:18px;">
                        <th>SR</th>
                        <th>Floor</th>
                        <th>line</th>
                        <th>Size</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sizes as $size)
                        <tr style="background-color:#f5eded;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $size->floor->name?? ''}}</td>
                            <td>{{ $size->line->name?? ''}}</td>
                            <td>{{ $size->name?? ''}}</td>
                            <td>{{$size->status ==1? 'Active' : 'InActive'}}</td>
                            <td>
                                @if($size->status==0)
                                    <a href="{{ route('sizeStatus', $size->id) }}" class="btn btn-sm btn-success p-1"
                                       title="Active"><span><i class="fas fa-check"></i></span></a>
                                @else
                                    <a href="{{ route('sizeStatus', $size->id) }}" class="btn btn-sm btn-danger p-1"
                                       title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                                @endif
                            </td>
                            <td class="d-flex ">
                                <a class="btn btn-info btn-sm " href="{{route('size_edit',$size->id)}}">Edit</a>
                                <form action="{{route('size_delete',$size->id)}}" method="POST">
                                    @method('DELETE')
                                     @csrf
                                     <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
