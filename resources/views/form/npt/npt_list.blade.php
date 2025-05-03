@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info">
            <table class="table table-active table-bordered">
                <thead>
                <div style="text-align: center;">
                    <img src="{{asset('dist/img/AdminLTELogo.png')}}" style="height: 80px; width: 120px;" alt=""><br>
                    <span>Unit-1,Gorat,Ashulia,Dhaka-Bangladesh</span><br><br>
                    <u class="h4" style="background-color: #f0f0f0; padding: 5px 20px; border-radius: 15px;">Today's NPT</u>
<br><br>
                </div>
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
@endsection

