@extends('master')
@section('content')
    <div class="card-header bg-cyan">
        <div class="row">
            <div class="col-md-6">
                <h3 class="card-title text-bold mt-2">Ten Card List</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{route('tenCardSetup' )}}" class="btn btn-primary"> Create New </a>
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
                        <th scope="col">Ten-card </th>
                        <th scope="col">Floor Name</th>
                        <th scope="col">Line Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                        <tr style="background-color:#f5eded;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name?? ''}}</td>
                            <td>{{ $data->floor->name?? ''}}</td>
                            <td>{{ $data->line->name?? ''}}</td>
                            <td>{{$data->status ==1? 'Active' : 'InActive'}}</td>
                            <td>
                                <a href="{{ route('tenCard_edit', $data->id) }}" class="btn btn-sm btn-info p-1" title="Edit"><i class="fas
                                fa-edit"></i></a>
                                @if($data->status ==0)
                                    <a href="{{ route('tenCardStatus', $data->id) }}" class="btn btn-sm btn-success p-1"
                                       title="Active"><span><i class="fas fa-check"></i></span></a>
                                @else
                                    <a href="{{ route('tenCardStatus', $data->id) }}" class="btn btn-sm btn-danger p-1"
                                       title="Inactive"><span><i class="fas fa-minus"></i></span></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            {{ $datas->links() }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
