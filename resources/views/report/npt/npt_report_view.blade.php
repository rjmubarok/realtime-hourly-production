@extends('master')
@section('content')
<style>
    .table td,
    .table th {
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
                <u class="h4">Non-Productive Time Report</u><br>
                <span>Date: {{ date('M j, Y', strtotime($from)) }} to {{ date('M j, Y', strtotime($to)) }}</span>,
                <span>Day Count: {{$diff_days+1 ?? ''}}</span><br>
                <span>Buyer Name: <b>{{$buyer_name->name ??''}}</b></span>,
                <span>Style: <b>{{$style ?? ''}}</b></span>, <span><u><b>Total NPT: {{count($npts)??
                            ''}}</b></u></span>
            </div>
            <hr>
            <div class="row">

                <div class="col-sm-12">
                    <div class="card card-info" style="">
                        <table class="table table-active table-bordered">
                            <thead>
                                <tr style="background-color:#110c3b;color:white;font-size:18px;">
                                    <th>Floor Name</th>
                                    <th>Line Name</th>
                                    <th>Buyer Name</th>
                                    <th>Style</th>
                                    <th>PO</th>
                                    <th>NPT</th>
                                    <th>LOST TIME (Minuites)</th>
                                    <th>Reason</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($npts)>0)
                                @php
                                $total_lose_minute = 0;
                                @endphp
                                @foreach ($npts as $data )
                                @php

                                $total_lose_minute += $data['lost_minuite'];

                                @endphp
                                <tr>
                                    <td>{{ $data->floor->name ??'' }}</td>
                                    <td>{{ $data->line->name ??'' }}</td>
                                    <td>{{ $data->buyer->name ??'' }}</td>
                                    <td>{{ $data->style }}</td>
                                    <td>{{ $data->po }}</td>
                                    <td>{{ $data->npt }}</td>
                                    <td>{{ $data->lost_minuite }}</td>
                                    <td>{{ $data->reason }}</td>
                                    
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total lost Minuites= {{ $total_lose_minute }}</td>
                                </tr>






                                @else
                                <td class="text-center" colspan="">Data Not Found</td>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
