@extends('master') @section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6"><h3 class="card-title text-bold mt-2">Mission & Vision List</h3></div>
                        <div class="col-md-6 text-right"><a href="{{route('createMissionVision' )}}" class="btn btn-primary"> Create New </a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table id="example" class="table table-striped datatable table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Sl.</th>
                                    <th scope="col">Mission Title</th>
                                    <th scope="col">Mission Image</th>
                                    <th scope="col">Mission Description</th>
                                    <th scope="col">Vision Title</th>
                                    <th scope="col">Vision Image</th>
                                    <th scope="col">Vision Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($missionVisions as $single_missionVision)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $single_missionVision->mission_title ?? '' }}</td>
                                        <td>
                                            <div class="text-center m-auto">
                                                <img src="{{ asset('/backend/mission_vision/' . $single_missionVision->mission_image) }}"
                                                     class="img-responsive img-circle" style="width: 50px; margin: auto; " alt="mission_image">
                                            </div>
                                        </td>
                                        <td style="height: 10px">{!! $single_missionVision->mission_description ?? '' !!}</td>
                                        <td>{{ $single_missionVision->vision_title ?? '' }}</td>
                                        <td>
                                            <div class="text-center m-auto">
                                                <img src="{{ asset('/backend/mission_vision/' . $single_missionVision->vision_image) }}"
                                                     class="img-responsive img-circle" style="width: 50px; margin: auto; " alt="vision_image">
                                            </div>

                                        </td>
                                        <td>{!! $single_missionVision->vision_description ?? ''  !!} </td>
                                        <td>
                                            <a href="{{route('editMissionVision',$single_missionVision->id )}}"
                                               class="pr-1 pl-1 rounded badge-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
    </div> @endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
