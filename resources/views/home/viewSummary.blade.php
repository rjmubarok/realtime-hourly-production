@extends('master')
@section('content')

    <div class="card-body">
        <div>
            <h4 class="text-center text-md-left">
                <span
                    style="background-color: yellow; padding: 4px 15px; border-radius: 10px; color: red; display: inline-block; margin-bottom: 10px;">
                    Target Not Met
                </span>
                <span
                    style="background-color: green; padding: 4px 15px; border-radius: 10px; color: white; display: inline-block; margin-bottom: 10px;">
                    Target Achieved
                </span>
                <span
                    style="background-color: blue; padding: 4px 15px; border-radius: 10px; color: white; display: inline-block; margin-bottom: 10px;">
                    Over Production
                </span>
                <span style="display: inline-block; margin-top: 10px;">
                    <a href="{{ url('/target-page') }}" class="btn btn-success"
                        style="background-color: #021409; border-radius: 25px; padding: 6px 15px; width: 100%; max-width: 300px; text-align: center;">
                        <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Contact Responsible Person
                    </a>
                </span>

                <span style="display: inline-block; margin-top: 10px;">
                    <a href="{{ url('/stopwatch') }}" class="btn btn-success"
                        style="background-color: #04050f; border-radius: 25px; padding: 6px 15px; width: 100%; max-width: 300px; text-align: center;">
                        <i class="fas fa-stopwatch" style="margin-right: 8px;"></i> DG Stopwatch
                    </a>
                </span>


            </h4>
        </div>



        <div class="row">

            @if (count($tableData) > 0)
                @foreach ($tableData as $tblIndex => $tableVal)
                    <h5>{{ $allFloor[$tblIndex] }}</h5>
                    <table id="customTable" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr style="background-color:#110c3b;color:white;font-size:18px;">
                                <th>Line Name</th>
                                <th>Buyer Name</th>
                                <th>Style</th>
                                <th>Run Day</th>
                                <th>SMV</th>
                                <th>QC Passed</th>
                                <th>Rectified</th>
                                <th>Defected</th>
                                <th>Rejected</th>
                                <th>Total Checked Today</th>
                                <th>Defects Quantity</th>

                                <th>DHU (%)</th>
                                <th>Efficiency (%)</th>
                                <th>Total Targt/Eff %</th>
                                <th>Hourly Target</th>
                                <th>6-7 am</th>
                                <th>7-8 am</th>
                                <th>8-9 am</th>
                                <th>9-10 am</th>
                                <th>10-11 am</th>
                                <th>11-12 am</th>
                                <th>12-1 pm</th>
                                <th>1-2 pm</th>
                                <th>2-3 pm</th>
                                <th>3-4 pm</th>
                                <th>4-5 pm</th>
                                <th>5-6 pm</th>
                                <th>6-7 pm</th>
                                <th>7-8 pm</th>
                                <!-- <th>8-9 pm</th> -->
                                {{-- <th>9-10 pm</th>
                    <th>10-11 pm</th> --}}
                                <th>Total</th>
                                <th>Comments</th>
                                <!-- <th><a href="{{ url('/target-page') }}" class="btn btn-primary">Call Responsible Person</a></th> -->

                                <!-- <th>Top Defects</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($tableVal) > 0)
                                @php
                                    $lineCount = count($tableVal);
                                    $totalSmv = 0;
                                    $totalQcPass = 0;
                                    $totalRectified = 0;
                                    $totalDefected = 0;
                                    $finalTopDefectes = '';
                                    $topDefectes = [];
                                    $totalReject = 0;
                                    $totalChecked = 0;
                                    $totalDefQty = 0;
                                    $totalDhu = 0;
                                    $totalAvgEff = 0;
                                    $totalHour = 0;
                                @endphp

                                @foreach ($tableVal as $lineIndex => $lineData)
                                    @php
                                        $lastRowShow = true;
                                        $totalSmv += $lineData['smv'];
                                        $totalQcPass += $lineData['qc_passed'];
                                        $totalRectified += $lineData['rectified'];
                                        $totalDefected += $lineData['defected'];
                                        $totalReject += $lineData['reject'];
                                        $totalChecked += $lineData['total_check'];
                                        $totalDefQty += $lineData['total_defect'];
                                        $totalDhu += $lineData['dhu'];
                                        $totalAvgEff += $lineData['average_eff'];
                                        $totalHour += $lineData['total_hour'];
                                        $topDefectes[] = explode(',', strtolower($lineData['defect_code']));
                                    @endphp
                                    <tr style="background-color:#bcf7b7;font-weight:bold;">
                                        <td> <a href="{{ route('redirect_line_dashboard', $lineData['line_idu']) }}">
                                                {{ $lineData['line_name'] }} </a> </td>
                                        <td>{{ $lineData['buyer_name'] }}</td>
                                        <td><a href="{{ route('buyer_report') }}"> {{ $lineData['style'] }}</a></td>
                                        <td> {{ $lineData['run_day'] }}</td>
                                        <td> {{ $lineData['smv'] }}</td>
                                        <td> {{ $lineData['qc_passed'] }}</td>
                                        <td> {{ $lineData['rectified'] }}</td>
                                        <td> {{ $lineData['defected'] }}</td>
                                        <td> {{ $lineData['reject'] }}</td>
                                        <td> {{ $lineData['total_check'] }}</td>
                                        <td> {{ $lineData['total_defect'] }}</td>

                                        <td style="color:red"> {{ number_format($lineData['dhu'], 2) }}%</td>
                                        <td style="color:green"> {{ number_format($lineData['average_eff'], 2) ?? 0 }}%
                                        </td>
                                        <td> {{ $lineData['total_target'] }}%</td>
                                        <!-- <td> {{ $lineData['today_target'] }} </td> -->
                                        <td>
                                            <marquee behavior="alternate" direction="right" scrollamount="3"
                                                style="color: red;">{{ $lineData['today_target'] }}</marquee>
                                        </td>
                                        @if ($lineData['ramadan1'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['ramadan1'] }}</td>
                                        @endif
                                        @if ($lineData['ramadan1'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['ramadan1'] }}</td>
                                        @endif
                                        @if ($lineData['ramadan1'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['ramadan1'] }}</td>
                                        @endif

                                        @if ($lineData['ramadan2'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['ramadan2'] }}</td>
                                        @endif
                                        @if ($lineData['ramadan2'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['ramadan2'] }}</td>
                                        @endif
                                        @if ($lineData['ramadan2'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['ramadan2'] }}</td>
                                        @endif


                                        @if ($lineData['first_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['first_hour'] }}</td>
                                        @endif
                                        @if ($lineData['first_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['first_hour'] }}</td>
                                        @endif
                                        @if ($lineData['first_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['first_hour'] }}</td>
                                        @endif

                                        @if ($lineData['sec_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['sec_hour'] }}</td>
                                        @endif
                                        @if ($lineData['sec_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['sec_hour'] }}</td>
                                        @endif
                                        @if ($lineData['sec_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['sec_hour'] }}</td>
                                        @endif


                                        @if ($lineData['third_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['third_hour'] }}</td>
                                        @endif
                                        @if ($lineData['third_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['third_hour'] }}</td>
                                        @endif
                                        @if ($lineData['third_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['third_hour'] }}</td>
                                        @endif

                                        @if ($lineData['fourth_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['fourth_hour'] }}</td>
                                        @endif
                                        @if ($lineData['fourth_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['fourth_hour'] }}</td>
                                        @endif
                                        @if ($lineData['fourth_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['fourth_hour'] }}</td>
                                        @endif

                                        @if ($lineData['fifth_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['fifth_hour'] }}</td>
                                        @endif
                                        @if ($lineData['fifth_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['fifth_hour'] }}</td>
                                        @endif
                                        @if ($lineData['fifth_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['fifth_hour'] }}</td>
                                        @endif

                                        @if ($lineData['sixth_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['sixth_hour'] }}</td>
                                        @endif
                                        @if ($lineData['sixth_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['sixth_hour'] }}</td>
                                        @endif
                                        @if ($lineData['sixth_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['sixth_hour'] }}</td>
                                        @endif

                                        @if ($lineData['seventh_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['seventh_hour'] }}</td>
                                        @endif
                                        @if ($lineData['seventh_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['seventh_hour'] }}</td>
                                        @endif
                                        @if ($lineData['seventh_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['seventh_hour'] }}</td>
                                        @endif

                                        @if ($lineData['eight_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['eight_hour'] }}</td>
                                        @endif
                                        @if ($lineData['eight_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['eight_hour'] }}</td>
                                        @endif
                                        @if ($lineData['eight_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['eight_hour'] }}</td>
                                        @endif


                                        @if ($lineData['nine_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['nine_hour'] }}</td>
                                        @endif
                                        @if ($lineData['nine_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['nine_hour'] }}</td>
                                        @endif
                                        @if ($lineData['nine_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['nine_hour'] }}</td>
                                        @endif

                                        @if ($lineData['ten_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['ten_hour'] }}</td>
                                        @endif
                                        @if ($lineData['ten_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['ten_hour'] }}</td>
                                        @endif
                                        @if ($lineData['ten_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['ten_hour'] }}</td>
                                        @endif


                                        @if ($lineData['ele_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['ele_hour'] }}</td>
                                        @endif
                                        @if ($lineData['ele_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['ele_hour'] }}</td>
                                        @endif
                                        @if ($lineData['ele_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['ele_hour'] }}</td>
                                        @endif

                                        @if ($lineData['twe_hour'] == $lineData['today_target'])
                                            <td class="bg-success">{{ $lineData['twe_hour'] }}</td>
                                        @endif
                                        @if ($lineData['twe_hour'] > $lineData['today_target'])
                                            <td class="bg-blue">{{ $lineData['twe_hour'] }}</td>
                                        @endif
                                        @if ($lineData['twe_hour'] < $lineData['today_target'])
                                            <td class="bg-warning">{{ $lineData['twe_hour'] }}</td>
                                        @endif

                                        <!--
                        @if ($lineData['thirteen_hour'] == $lineData['today_target'])
    <td class="bg-success">{{ $lineData['thirteen_hour'] }}</td>
    @endif
                        @if ($lineData['thirteen_hour'] > $lineData['today_target'])
    <td class="bg-blue">{{ $lineData['thirteen_hour'] }}</td>
    @endif
                        @if ($lineData['thirteen_hour'] < $lineData['today_target'])
    <td class="bg-warning">{{ $lineData['thirteen_hour'] }}</td>
    @endif -->

                                        {{-- <td  style="color:red"> {{ number_format($lineData['dhu'], 2)}}%</td>
                    <td  style="color:green"> {{ number_format($lineData['average_eff'], 2) ?? 0}}%</td>
                    <td> {{ $lineData['total_target'] }}</td>
                    <td> {{ $lineData['today_target'] }} </td>
                    <td> {{ $lineData['ramadan1'] }} </td>
                    <td> {{ $lineData['ramadan2'] }} </td>
                    <td> {{ $lineData['first_hour'] }} </td>
                    <td> {{ $lineData['sec_hour'] }} </td>
                    <td> {{ $lineData['third_hour'] }} </td>
                    <td> {{ $lineData['fourth_hour'] }} </td>
                    <td> {{ $lineData['fifth_hour'] }} </td>
                    <td> {{ $lineData['sixth_hour'] }} </td>
                    <td> {{ $lineData['seventh_hour'] }} </td>
                    <td> {{ $lineData['eight_hour'] }} </td>
                    <td> {{ $lineData['nine_hour'] }} </td>
                    <td> {{ $lineData['ten_hour'] }} </td>
                    <td> {{ $lineData['ele_hour'] }} </td>
                    <td> {{ $lineData['twe_hour'] }} </td>
                    <td> {{ $lineData['thirteen_hour'] }} </td> --}}
                                        {{-- <td> {{ $lineData['fourteen_hour'] }} </td>
                    <td> {{ $lineData['fifteen_hour'] }} </td> --}}
                                        <td> {{ $lineData['total_hour'] }} </td>
                                        <td> {{ $lineData['comments'] }} </td>
                                        <!-- <td>{{ strtolower($lineData['defect_code']) }}</td> -->

                                    </tr>
                                @endforeach

                                @php
                                    $topDefectesArr =
                                        count($topDefectes) > 1
                                            ? call_user_func_array('array_intersect', $topDefectes)
                                            : $topDefectes[0];
                                @endphp
                                <tr style="background-color:#e1f7df;">
                                    <td style="background-color:#bcf7b7;font-weight:bold;">Grand Total➔</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ number_format($totalSmv / $lineCount, 2) }}</td>
                                    <td>{{ $totalQcPass }}</td>
                                    <td>{{ $totalRectified }}</td>
                                    <td>{{ $totalDefected }}</td>
                                    <td>{{ $totalReject }}</td>
                                    <td>{{ $totalChecked }}</td>
                                    <td>{{ $totalDefQty }}</td>

                                    <td>{{ number_format($totalDhu / $lineCount, 2) }}%</td>
                                    <td>{{ number_format($totalAvgEff / $lineCount, 2) }}%</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>





                                    <!-- <td>{{ $totalHour }}</td>
                        <td></td> -->
                                    <!-- <td>{{ implode(',', $topDefectesArr) }}</td> -->



                                </tr>
                            @else
                                <tr>
                                    <td colspan="29">No available data.</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                @endforeach
            @else
                <p>No report data available.</p>
            @endif
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Line Wise DHU</div>

                    <div class="card-body">

                        <canvas id="myChart" height="100px"></canvas>

                    </div>

                </div>
            </div>
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header">Defect count</div>

                    <div class="card-body">

                        <canvas id="defectChart" height="100px"></canvas>

                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection

@push('meta')
    <meta http-equiv="refresh" content="20">
@endpush

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script type="text/javascript">
        var labels = {{ Js::from($line_name) }};
        var dhus = {{ js::from($dhus) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Line wise DHU %',
                backgroundColor: 'rgb(39,29,196)',
                borderColor: 'rgb(238,2,2)',
                borderWidth: 1,
                align: 'top',
                data: dhus,
            }]

        };


        const config = {
            type: 'bar',
            data: data,
            options: {}
        };


        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script>
        const ctx = document.getElementById('defectChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {{ Js::from($line_name) }},
                datasets: [{
                    label: 'Defect On Line',
                    data: {{ Js::from($defect_codes) }},

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#customTable').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endpush
