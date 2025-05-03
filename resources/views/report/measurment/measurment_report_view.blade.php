@extends('master')
@section('content')
    <style>
        table {
            text-align: left;
            position: relative;
            border-collapse: collapse;
        }
        /* .table td, .table th {
            padding: 5px;
            font-size: 14px;
        } */
        th {

            position: sticky;
            top: 55px;
            background-color:#fbfce6;
            color:#110c3b;
            padding: 5px;
            font-size: 19px;

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
                    <u class="h4">Measurments Report</u><br>
                    <span>Date: {{ date('M j, Y', strtotime($from)) }} to {{ date('M j, Y', strtotime($to)) }}</span>,
                    <span>Day Count: {{$diff_days+1 ?? ''}}</span><br>
                    <span>Floor Name: <b>{{$floor_name->name??''}}</b></span>,
                    <span>Line Name: <b>{{ $line_name->name??'' }}</b></span>,
                    <span>Buyer Name: <b>{{$buyer_name->name??''}}</b></span>,
                    <span>Style: <b>{{$style ?? ''}}</b></span>, <span><u><b>Total Measured: {{count($measurments)?? ''}}</b></u></span>
                </div>
                <hr>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card card-info" style="">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="red">
                                        <th>Jacket/ <br> Pant</th>
                                        <th>AW/BW <br>NW</th>
                                        <th>Size</th>
                                        <th>Remarks</th>
                                        <th>Cheat/ <br>Waist</th>
                                        <th>Bottom Sweeps /<br> Hip/Seat</th>
                                        <th>Sleeve Length /<br> Inseam</th>
                                        <th>Across_shouler /<br> Front Rise</th>
                                        <th>Armhole /<br> Seat(Straight @ bottom of the fly)</th>
                                        <th>Center Back Lenght  <br> / Thigh</th>
                                        <th>Hood_length/ <br> Back_rise</th>
                                        <th>Hood_Width</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($measurments)>0)

                                    @foreach ($measurments as $measurement)
                                    <tr style="font-size:18px;font-weight:bold;">
                                        <td>{{ $measurement->jacket_pant }}</td>
                                        <td>{{ $measurement->aw_bw }}</td>
                                        <td>{{ $measurement->size }}</td>
                                        <td>{{ $measurement->tolarance }}</td>
                                        <td>
                                            @php
                                            $cheats = json_decode($measurement->cheat);
                                            @endphp

                                            @foreach ((array) $cheats as $value)
                                            <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success color:black
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br> </span>
                                            @endforeach
                                            @php
                                            $waists = json_decode($measurement->waist);
                                            @endphp


                                            @foreach ((array) $waists as $value)

                                            <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach

                                        </td>
                                        <td>
                                            @php
                                            $bottom_sweeps = json_decode($measurement->bottom_sweep);
                                            @endphp
                                            @foreach ((array) $bottom_sweeps as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach

                                            @php
                                            $hip_seats = json_decode($measurement->hip_seat);
                                            @endphp

                                            @foreach ((array) $hip_seats as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $sleeve_lenghts = json_decode($measurement->sleeve_lenght);
                                            @endphp

                                            @foreach ((array) $sleeve_lenghts as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                            @php
                                            $inseams = json_decode($measurement->inseam);
                                            @endphp

                                            @foreach ((array) $inseams as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $across_shoulers = json_decode($measurement->across_shouler);
                                            @endphp

                                            @foreach ((array) $across_shoulers as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                            @php
                                            $front_rises = json_decode($measurement->front_rise);
                                            @endphp

                                            @foreach ((array) $front_rises as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>

                                        <td>
                                            @php
                                            $armholes = json_decode($measurement->armhole);
                                            @endphp

                                            @foreach ((array) $armholes as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                            @php
                                            $seats = json_decode($measurement->seat);
                                            @endphp

                                            @foreach ((array) $seats as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $center_back_lenghts = json_decode($measurement->center_back_lenght);
                                            @endphp

                                            @foreach ((array) $center_back_lenghts as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                            @php
                                            $thighs = json_decode($measurement->thigh);
                                            @endphp

                                            @foreach ((array) $thighs as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $hood_lengths = json_decode($measurement->hood_length);
                                            @endphp

                                            @foreach ((array) $hood_lengths as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                            @php
                                            $back_rises = json_decode($measurement->back_rise);
                                            @endphp
                                            @foreach ((array) $back_rises as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $hood_widths = json_decode($measurement->hood_width);

                                            @endphp

                                            @foreach ((array) $hood_widths as $value)
                                           <span class="text-dark @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                            @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger

                                            @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                            @else
                                            bg-secondary
                                            @endif ">{{ $value }} <br></span>
                                            @endforeach
                                        </td>

                                        <td></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <td class="text-center" colspan="16">Data Not Found</td>
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
