@extends('master')
@section('content')
<style>
    table {
        text-align: left;
        position: relative;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 0.25rem;
    }

    tr.red th {
        background:#110c3b;
        color: white;
    }

    tr.green th {
        background: green;
        color: white;
    }

    tr.purple th {
        background: purple;
        color: white;
    }

    th {
        position: sticky;
        top: 55px;

    }
</style>
<div class="row mb-2 bg-white">
    <div class="col-sm-12">

        
            <table class="table table-bordered">

                <thead>
                    <div class="text-center">
                        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" style="height: 80px; width: 120px;" alt=""><br>
                        <span>Unit-1,Gorat,Ashulia,Dhaka-Bangladesh</span><br>
                        <u class="h4">Today's Measurements</u><br>
                        <h6>Yellow=(+)ve,Red=(-)ve and Green=0</h6>
                    </div>
                    <tr class="red" style="background-color:#110c3b;color:white;font-size:16px;">
                        <th>Jacket/Pant</th>
                        <th>AW/BW <br> NW</th>
                        <th>Floor Name</th>
                        <th>Line Name</th>
                        <th>Buyer Name</th>
                        <th>Style</th>
                        <th>Size</th>
                        <th>Remarks</th>
                        <th>Chest/Waist</th>
                        <th>Bottom Sweeps /<br> Hip/Seat</th>
                        <th>Sleeve Length /<br> Inseam</th>
                        <th>Across_shouler /<br> Front Rise</th>
                        <th>Armhole / <br> Seat(Straight @ bottom of the fly)</th>
                        <th>Center Back Lenght /<br> Thigh</th>
                        <th>Hood_length/ <br>Back_rise</th>
                        <th>Hood_Width</th>
    
                    </tr>
                </thead>
                <tbody>
                    @if (count($measurments) > 0)
                    @foreach ($measurments as $measurement)
                    <tr>
                        <td>{{ $measurement->jacket_pant }}</td>
                        <td>{{ $measurement->aw_bw }}</td>
                        <td>{{ $measurement->floor->name ?? '' }}</td>
                        <td>{{ $measurement->line->name ?? '' }}</td>
                        <td>{{ $measurement->buyer->name ?? '' }}</td>
    
                        <td>{{ $measurement->style }}</td>
                        <td>{{ $measurement->size }}</td>
    
                        <td>{{ $measurement->tolarance }}</td>
    
                        <td>
                            @php
                            $cheats = json_decode($measurement->cheat);
                            @endphp
    
                            @foreach ((array) $cheats as $value)
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||
    
                            $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                    @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger
    
                                    @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                    @else
                                    bg-secondary
                                    @endif ">{{ $value }} <br>  </span>
                            @endforeach
                            @php
                            $waists = json_decode($measurement->waist);
                            @endphp
    
    
                            @foreach ((array) $waists as $value)
    
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                    @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger
    
                                    @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                    @else
                                    bg-secondary
                                    @endif ">{{ $value }} <br> </span>
                            @endforeach
    
                        </td>
                        <td>
                            @php
                            $bottom_sweeps = json_decode($measurement->bottom_sweep);
                            @endphp
                            @foreach ((array) $bottom_sweeps as $value)
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
                                    @elseif($value=='inch -1/4'|| $value=='inch -1/2'|| $value=='inch -3/4'|| $value=='inch -1'|| $value=='inch -1 1/4'  || $value=='cm -0.3'|| $value=='cm -0.5'|| $value=='cm -0.8'|| $value=='cm -1'|| $value=='cm -1.5')   bg-danger
    
                                    @elseif ($value=='inch 0'|| $value=='cm(+)0')   bg-success
                                    @else
                                    bg-secondary
                                    @endif ">{{ $value }} <br> </span>
                            @endforeach
    
                            @php
                            $hip_seats = json_decode($measurement->hip_seat);
                            @endphp
    
                            @foreach ((array) $hip_seats as $value)
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                            <span class=" @if ($value == 'inch (+)1 1/4' || $value == 'inch (+)1' || $value == 'inch (+) 3/4'||$value=='inch (+)1/2'|| $value=='inch (+)1/4'||   $value == 'cm(+)1.5' || $value == 'cm(+)1' || $value == 'cm(+)0.8'||$value=='cm(+)0.5'|| $value=='cm(+)0.3' )   bg-warning
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
                    <td class="  bg-center" colspan="16">Data Not Found</td>
                    @endif
    
    
                </tbody>
    
    
    
            </table>
       
        
    </div>
</div>



@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



@endpush