@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">Menu List</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('createMenuPage' )}}" class="btn btn-primary"> Create New </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table id="example" class="table table-striped datatable table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Sl.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Parent</th>
                                    <th scope="col">Index</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menus as $menu)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $menu->title }}</td>
                                        <td>{{ $menu->parent_id == null ? $menu->title : $menu->parent->title  }}</td>
                                        <td>{{ $menu->index  }}</td>
                                        <td>{{$menu->url }}</td>
                                        <td>{{$menu->status===0 ? 'Inactive' : 'Active' }}</td>
                                        <td>
                                            <button class="" data-id="">
                                                <a href="{{route('editMenuPage',$menu->id )}}" class="pr-1 pl-1 rounded badge-info"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i></a>
                                            </button>
                                            @if ($menu->status == 1)
                                                <a href="{{ route('inactiveMenuPage', $menu->id) }}"
                                                   class="pr-1 pl-1 rounded badge-danger" data-toggle="tooltip"
                                                   data-placement="top" title="Inactive"><i class="fas fa-times"></i></a>
                                            @else
                                                <a href="{{ route('activeMenuPage', $menu->id) }}"
                                                   class="pr-1 pl-1 rounded badge-success" data-toggle="tooltip"
                                                   data-placement="top" title="Active"><i class="fas fa-check"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
