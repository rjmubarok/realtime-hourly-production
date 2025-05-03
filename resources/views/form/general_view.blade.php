@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">General Info List</h3>
                        </div>
                        @if($data->count()==0)
                            <div class="col-md-6 text-right">
                                <a href="{{route('generalForm' )}}" class="btn btn-primary"> Create New </a>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table id="example" class="table table-striped datatable table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Today's Target/ Hourly</th>
                                    <th scope="col">Total Target/Effi(%)</th>
                                    <th scope="col">Yesterday T.Prod/Eff(%)</th>
                                    <th scope="col">Finishing Received</th>
                                    <th scope="col">Man Power</th>
                                    <th scope="col">Buyer Name</th>
                                    <th scope="col">SMV</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $generalData)
                                    <tr>
                                        <td>{{ $generalData->today_target?? ''}}</td>
                                        <td>{{ $generalData->total_target ?? ''}}</td>
                                        <td>{{ $generalData->total_production ?? ''}}</td>
                                        <td>{{ $generalData->finishing_receive ?? ''}}</td>
                                        <td>{{ $generalData->man_power ?? ''}}</td>
                                        <td>{{ $generalData->buyer_name ?? ''}}</td>
                                        <td>{{ $generalData->smv ?? ''}}</td>
                                        <td>{{ $generalData->comments ?? ''}}</td>
                                        <td>
                                            <button class="" data-id="">
                                                <a href="{{route('editGeneralForm',$generalData->id )}}" class="pr-1 pl-1 rounded badge-info"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i></a>
                                            </button>
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
