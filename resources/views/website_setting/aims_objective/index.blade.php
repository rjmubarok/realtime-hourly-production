@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6"><h3 class="card-title text-bold mt-2">Aims & Objective List</h3></div>
                        <div class="col-md-6 text-right"><a href="{{route('createAimsObjective' )}}" class="btn btn-primary"> Create New </a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table id="example" class="table table-striped datatable table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Sl.</th>
                                    <th scope="col">Aims Title (English)</th>
                                    {{--                                    <th scope="col">Aims Title (Bangla)</th>--}}
                                    <th scope="col">Aims Image</th>
                                    <th scope="col">Aims Description (English)</th>
                                    {{--                                    <th scope="col">Aims Description (Bangla)</th>--}}
                                    <th scope="col">Object Title (English)</th>
                                    {{--                                    <th scope="col">Object Title (Bangla)</th>--}}
                                    <th scope="col">Object Image</th>
                                    <th scope="col">Object Description (English)</th>
                                    {{--                                    <th scope="col">Object Description (Bangla) </th>--}}
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aimsObjectives as $single_aimsObjective)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $single_aimsObjective->aims_title_en ?? '' }}</td>
                                        {{--                                        <td>{{ $single_aimsObjective->aims_title_bn ?? '' }}</td>--}}
                                        <td>
                                            <div class="text-center m-auto">
                                                <img src="{{ asset('/backend/aims_objective/' . $single_aimsObjective->aims_image) }}"
                                                     class="img-responsive img-circle" style="width: 50px; margin: auto; " alt="mission_image">
                                            </div>
                                        </td>
                                        <td style="height: 10px">{!! $single_aimsObjective->aims_description_en ?? '' !!}</td>
                                        {{--                                        <td style="height: 10px">{!! $single_aimsObjective->aims_description_bn ?? '' !!}</td>--}}
                                        <td>{{ $single_aimsObjective->objective_title_en ?? '' }}</td>
                                        {{--                                        <td>{{ $single_aimsObjective->objective_title_bn ?? '' }}</td>--}}
                                        <td>
                                            <div class="text-center m-auto">
                                                <img src="{{ asset('/backend/aims_objective/' . $single_aimsObjective->objective_image) }}"
                                                     class="img-responsive img-circle" style="width: 50px; margin: auto; " alt="objective_image">
                                            </div>

                                        </td>
                                        <td>{!! $single_aimsObjective->objective_description_en ?? ''  !!} </td>
                                        {{--                                        <td>{!! $single_aimsObjective->objective_description_bn ?? ''  !!} </td>--}}
                                        <td>
                                            <a href="{{route('editAimsObjective',$single_aimsObjective->id )}}"
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
