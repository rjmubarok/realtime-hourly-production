@extends('master')
@section('content')

<div class="card-body">
    <div class="row">

        @if(count($tableData) > 0)
        @foreach($tableData as $tblIndex=>$tableVal)
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
                    <th>Average Efficiency (%)</th>
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
                    <th>Top Defects</th>
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
                <tr>
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

                    <td> {{ number_format($lineData['dhu'], 2)}}%</td>
                    <td> {{ number_format($lineData['average_eff'], 2) ?? 0}}%</td>
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
                    <td>{{ strtoupper($lineData['defect_code']) }}</td>



                </tr>
                @endforeach

                @php
                $topDefectesArr = (count($topDefectes) > 1) ? call_user_func_array('array_intersect', $topDefectes) :
                $topDefectes[0];
                @endphp
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Average SMV= {{ number_format($totalSmv/$lineCount,2) }}</td>
                    <td>Total qc pass= {{ $totalQcPass }}</td>
                    <td>Total Rectify={{ $totalRectified }}</td>
                    <td>Total Defected={{ $totalDefected }}</td>
                    <td>Total Rejected={{ $totalReject }}</td>
                    <td>Total Checked={{ $totalChecked }}</td>
                    <td>T.defect qty={{ $totalDefQty }}</td>

                    <td>Average DHU={{ number_format($totalDhu/$lineCount,2) }}%</td>
                    <td>Average Efficiency={{ number_format($totalAvgEff/$lineCount,2) }}%</td>
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
                    <td>Floor Total={{ $totalHour }}</td>
                    <td></td>
                    <td>Floor Top Defect ={{ implode(',',$topDefectesArr) }}</td>


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





@endsection

@push('meta')
<meta http-equiv="refresh" content="20">
@endpush

@push('script')


<script>
    $(document).ready(function () {
            $('#customTable').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });
</script>
@endpush
