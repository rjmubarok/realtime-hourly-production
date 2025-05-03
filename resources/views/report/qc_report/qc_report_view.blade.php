@extends('master')
@section('content')
<div style="text-align: center;font-size:20px;font-weight:bold;">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" style="height: 100px; width: 150px;" alt=""><br>
    <span>Unit-1,Gorat,Ashulia,Dhaka-Bangladesh</span><br>
    <u class="h4">Hourly Production Report</u><br>
    <span>Date: {{ date('M j, Y', strtotime($from)) }} to {{ date('M j, Y', strtotime($to)) }}</span>,
    <span>Day Count: {{$diff_days+1 ?? ''}}</span><br>


</div>
<div class="card-body">
    <div class="row">

        @if(count($tableData) > 0)
        @foreach($tableData as $tblIndex=>$tableVal)

        <table id="customTable" class="table table-striped table-bordered table-sm">
            <thead>
                <tr style="background-color:#e5ff7d;color:blue;font-size:18px;">
                    <th>Date</th>
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
                    <th>8-9 pm</th>
                    <th>9-10 pm</th>
                    <th>10-11 pm</th>
                    <th>Total</th>
                    <th>Comments</th>

                    <!-- <th>Top Defects</th> -->
                </tr>
            </thead>
            <tbody>
                @if(count($tableVal) >0)
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

                @foreach($tableVal as $lineIndex=>$lineData)
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
                $topDefectes[] = explode(',',strtoupper($lineData['defect_code']));
                @endphp
                <tr style=font-size:18px;font-weight:bold;>
                    <td> {{date('d-M-Y', strtotime( $lineData['created_at'])) }}</td>
                    <td> {{ $lineData['line_name']
                        }}</td>
                    <td> {{ $lineData['buyer_name'] }}</td>
                    <td> {{ $lineData['style'] }}</td>
                    <td> {{ $lineData['run_day'] }}</td>
                    <td> {{ $lineData['smv'] }}</td>

                    <td> {{ $lineData['qc_passed'] }}</td>
                    <td> {{ $lineData['rectified'] }}</td>
                    <td> {{ $lineData['defected'] }}</td>
                    <td> {{ $lineData['reject'] }}</td>
                    <td> {{ $lineData['total_check'] }}</td>
                    <td> {{ $lineData['total_defect'] }}</td>

                    <td style="color:red"> {{ number_format($lineData['dhu'], 2)}}%</td>
                    <td style="color:green"> {{ number_format($lineData['average_eff'], 2) ?? 0}}%</td>
                    <td> {{ $lineData['total_target'] }}%</td>
                    <td> {{ $lineData['today_target'] }} </td>
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
                    <td> {{ $lineData['thirteen_hour'] }} </td>
                    <td> {{ $lineData['fourteen_hour'] }} </td>
                    <td> {{ $lineData['fifteen_hour'] }} </td>
                    <td> {{ $lineData['total_hour'] }} </td>
                    <td> {{ $lineData['comments'] }} </td>

                    <!-- <td>{{ strtoupper($lineData['defect_code']) }}</td> -->



                </tr>
                @endforeach

                @php
                $topDefectesArr = (count($topDefectes) > 1) ? call_user_func_array('array_intersect', $topDefectes) :
                $topDefectes[0];
                @endphp
                <tr style="background-color:#caf7c6;font-weight:bold;font-size:20px">
                    <td>GT➔</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ number_format($totalSmv/$lineCount,2) }}</td>
                    <td>{{ $totalQcPass }}</td>
                    <td>{{ $totalRectified }}</td>
                    <td>{{ $totalDefected }}</td>
                    <td>{{ $totalReject }}</td>
                    <td>{{ $totalChecked }}</td>
                    <td>{{ $totalDefQty }}</td>

                    <td>{{ number_format($totalDhu/$lineCount,2) }}%</td>
                    <td>{{ number_format($totalAvgEff/$lineCount,2) }}%</td>
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
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $totalHour }}</td>
                    <td></td>
                    <!-- <td>{{ implode(',',$topDefectesArr) }}</td> -->


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





@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script type="text/javascript">
    var labels =  {{ Js::from($line_name) }};
    var dhus = {{ js::from( $dhus) }} ;

    const data = {
        labels: labels,
        datasets: [{
            label: 'Line wise DHU %',
            backgroundColor: 'rgb(39,29,196)',
            borderColor: 'rgb(238,2,2)',
            borderWidth: 1,
            data: dhus,
        }]
    };

    const config = {
        type: 'line',
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
@endpush




