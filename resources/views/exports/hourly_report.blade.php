<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hourly Production</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body>
    <?php $sum_today_target = 0; ?>
    <?php $sum_hourly_target = 0; ?>
    <?php $first = 0; ?>
    <?php $second = 0; ?>
    <?php $third = 0; ?>
    <?php $fourth = 0; ?>
    <?php $fifth = 0; ?>
    <?php $sixth = 0; ?>
    <?php $seventh = 0; ?>
    <?php $eighth = 0; ?>
    <?php $ninth = 0; ?>
    <?php $tenth = 0; ?>
    <?php $eleventh = 0; ?>
    <?php $twelfth = 0; ?>
    <?php $thirteenth = 0; ?>
    <?php $fourteenth = 0; ?>
    <?php $total = 0; ?>
    <?php $eighthourrutine = 0; ?>
    <?php $fourhour_ot = 0; ?>

    <div class="row mb-2">
        <div class="col-md-12">
        <form action="{{ route('download.hourly.report') }}" method="GET">
    <input type="hidden" value="{{ $start_date  }}" name="start_date" required>
    <input type="hidden" value="{{ $end_date }}" name="end_date" required>
    <button class="btn btn-dark" type="submit">Download Excel Report</button>
</form>
            <div class="card card-info" style="">

                <h2 class="text-center">Production Report from {{ $start_date }} to {{ $end_date }}</h2>

                <table border="1" cellpadding="5" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Line Name</th>
                            <th>Total Records</th>
                            <th>Day Target</th>
                            <th>Hourly Target</th>
                            <th>First</th>
                            <th>Second</th>
                            <th>Third</th>
                            <th>Fourth</th>
                            <th>Fifth</th>
                            <th>Sixth</th>
                            <th>Seventh</th>
                            <th>Eighth</th>
                            <th>Ninth</th>
                            <th>Tenth</th>
                            <th>Eleventh</th>
                            <th>Twelfth</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $row)
                            <tr>
                                <td>{{ $row->line_name }}</td>
                                <td>{{ $row->total_records }}</td>
                                <td>{{ $row->sum_day_tar ?? 0 }}</td>
                                <td>{{ $row->sum_hourly_tar ?? 0 }}</td>
                                <td>{{ $row->sum_first ?? 0 }}</td>
                                <td>{{ $row->sum_second ?? 0 }}</td>
                                <td>{{ $row->sum_third ?? 0 }}</td>
                                <td>{{ $row->sum_fourth ?? 0 }}</td>
                                <td>{{ $row->sum_fifth ?? 0 }}</td>
                                <td>{{ $row->sum_sixth ?? 0 }}</td>
                                <td>{{ $row->sum_seventh ?? 0 }}</td>
                                <td>{{ $row->sum_eighth ?? 0 }}</td>
                                <td>{{ $row->sum_ninth ?? 0 }}</td>
                                <td>{{ $row->sum_tenth ?? 0 }}</td>
                                <td>{{ $row->sum_eleventh ?? 0 }}</td>
                                <td>{{ $row->sum_twelfth ?? 0 }}</td>
                                <td>{{ $row->sum_first + $row->sum_second + $row->sum_third + $row->sum_fourth + $row->sum_fifth + $row->sum_sixth + $row->sum_seventh + $row->sum_eighth + $row->sum_ninth + $row->sum_tenth + $row->sum_eleventh + $row->sum_twelfth + $row->sum_twelfth }}
                                </td>
                            </tr>

                            <?php $sum_today_target += $row->sum_day_tar; ?>
                            <?php $sum_hourly_target += $row->sum_hourly_tar; ?>
                            <?php $first += $row->sum_first; ?>
                            <?php $second += $row->sum_second; ?>
                            <?php $third += $row->sum_third; ?>
                            <?php $fourth += $row->sum_fourth; ?>
                            <?php $fifth += $row->sum_fifth; ?>
                            <?php $sixth += $row->sum_sixth; ?>
                            <?php $seventh += $row->sum_seventh; ?>
                            <?php $eighth += $row->sum_eighth; ?>
                            <?php $ninth += $row->sum_ninth; ?>
                            <?php $tenth += $row->sum_tenth; ?>
                            <?php $eleventh += $row->sum_eleventh; ?>
                            <?php $twelfth += $row->sum_twelfth; ?>

                            <?php $total += $row->sum_first + $row->sum_second + $row->sum_third + $row->sum_fourth + $row->sum_fifth + $row->sum_sixth + $row->sum_seventh + $row->sum_eighth + $row->sum_ninth + $row->sum_tenth + $row->sum_eleventh + $row->sum_twelfth + $row->sum_twelfth; ?>

                            {{--  //eighthourrutine day --}}
                            <?php $eighthourrutine += $row->sum_first + $row->sum_second + $row->sum_third + $row->sum_fourth + $row->sum_fifth + $row->sum_sixth + $row->sum_seventh + $row->sum_eighth; ?>
                            {{--  //fourhour_ot day --}}
                            <?php $fourhour_ot += $row->sum_ninth + $row->sum_tenth + $row->sum_eleventh + $row->sum_twelfth + $row->sum_twelfth; ?>
                        @endforeach
                        <tr>
                            <td>Grand Total</td>
                            <td></td>
                            <td>{{ $sum_today_target }}</td>
                            <td>{{ $sum_hourly_target }}</td>
                            <td>{{ $first }} </td>
                            <td>{{ $second }}</td>
                            <td>{{ $third }}</td>
                            <td>{{ $fourth }}</td>
                            <td>{{ $fifth }}</td>
                            <td>{{ $sixth }}</td>
                            <td>{{ $seventh }}</td>
                            <td>{{ $eighth }}</td>
                            <td>{{ $ninth }}</td>
                            <td>{{ $tenth }}</td>
                            <td>{{ $eleventh }}</td>
                            <td>{{ $twelfth }}</td>
                            <td>{{ $total }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Target Achievement of the Range Of Date @if ($total > 0 && $sum_today_target > 0)
                                    {{ number_format(($total / $sum_today_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="3" class="text-bold">Target Achievement in 1st Hour:@if ($first > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($first / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="3" class="text-bold">Target Achievement in 2nd Hour:@if ($second > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($second / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4" class="text-bold"> Target Achievement after 08 Hours Routine Duty:
                                @if ($eighthourrutine > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($eighthourrutine / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4" class="text-bold"> Target Achievement during 04 Hours OT:@if ($fourhour_ot > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($fourhour_ot / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>

    </div>









    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>







</body>

</html>
