@extends('master')
@section('content')
    <style>
        .table td, .table th {
            padding: 10px;
            font-size: 14px;
        }
    </style>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <input type="button" class="btn btn-success no_print" id="hideMe" onclick="return window.print();"
                   value="Print">
            <a href="javascript:void(0)" onclick="window.close();" class="btn btn-warning no_print">
                <i class="fas fa-fast-backward"></i> Close
            </a>
        </div>
    </div>
    <div id="SelectToPrint">
        <div class="row">
            <div class="col">
                <div style="text-align: center;">
                    <img src="{{asset('dist/img/AdminLTELogo.png')}}" style="height: 80px; width: 120px;" alt=""><br>
                    <span>Unit-1,Gorat,Ashulia,Dhaka-Bangladesh</span><br>
                    <u class="h4">Operator Performance Report</u><br>
                    <span>Floor Name: <b>{{$floor_name->name??''}}</b></span>,
                    <span>Line Name: <b>{{ $line_name->name??'' }}</b></span>,
                    <span>Buyer Name: <b>{{$buyer_name->name??''}}</b></span>,
                    <span>Style: <b>{{$style ?? ''}}</b></span>, <span><u><b>Total Operator Listed: {{count($OperatorPerformances)?? ''}}</b></u></span>
                </div>
                <hr>
                <table class="table table-bordered details">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>OP Name & ID</th>
                            <th>Designation</th>
                            <th>Joining Date</th>
                            <th>Running Process</th>
                            <th>SMV</th>
                            <th>Avg. Cycle Time</th>
                            <th>Target</th>
                            <th>Achieved</th>
                            <th>Performance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($OperatorPerformances as $data)
                        <tr>
                            <td> {{$loop->iteration }} </td>
                            <td> {{$data->operator->name??''}} </td>
                            <td> {{$data->designation->name??''}} </td>
                            <td> {{$data->join_date ??''}} </td>
                            <td> {{$data->running_process ??''}} </td>
                            <td> {{$data->smv ??''}} </td>
                            <td> {{$data->avg_cycle_time ??''}} </td>
                            <td> {{$data->target ??''}} </td>
                            <td> {{$data->achieved ??''}} </td>
                            <td> {{ number_format(($data->achieved/$data->target )*100 ,2) }} %</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No Data Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                    <tbody>


                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection
