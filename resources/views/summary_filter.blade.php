<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hourly Production Summary</title>
    @if (Route::is('hourlyproduction_summary'))
        <meta http-equiv="refresh" content="120">
    @endif
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body>


    @foreach ($productions as $floor)
        <div class="col-md-12">
            <?php $total_sum_today_target = 0; ?>
            <?php $total_sum_hourly_target = 0; ?>
            <?php $total_first = 0; ?>
            <?php $total_second = 0; ?>
            <?php $total_third = 0; ?>
            <?php $total_fourth = 0; ?>
            <?php $total_fifth = 0; ?>
            <?php $total_sixth = 0; ?>
            <?php $total_seventh = 0; ?>
            <?php $total_eighth = 0; ?>
            <?php $total_ninth = 0; ?>
            <?php $total_tenth = 0; ?>
            <?php $total_eleventh = 0; ?>
            <?php $total_twelfth = 0; ?>
            <?php $total_thirteenth = 0; ?>
            <?php $total_fourteenth = 0; ?>
            <?php $total_total = 0; ?>
            <?php $total_eighthourrutine = 0; ?>
            <?php $total_fourhour_ot = 0; ?>

            <div class="card card-info">
                <div class="card-body text-center " style=" background-color: lightblue;">
                    <h3 class=" text-bold mt-2">Hourly Production Summary</h3>
                    <h3 class=" text-bold mt-2">Line Wise Hourly Production Floor - {{ $floor['floor_name'] ?? '' }}
                    </h3>
                    <h3 class=" text-bold mt-2">Date: {{ $start_date }} TO {{ $end_date }}</h3>
                </div>
            </div>
            <table id="customTable" class="table table-striped table-bordered table-sm">
                @if ($floor['lines']->count())
                    <thead>
                        <tr style="background-color:#110c3b;color:white;font-size:18px;">

                            <th scope="col">Line Name</th>

                            <th scope="col">Today Target</th>
                            <th scope="col">Hourly Target</th>
                            <th scope="col">1st</th>
                            <th scope="col">2nd</th>
                            <th scope="col">3rd</th>
                            <th scope="col">4th</th>
                            <th scope="col">5th</th>
                            <th scope="col">6th</th>
                            <th scope="col">7th</th>
                            <th scope="col">8th</th>
                            <th scope="col">9th</th>
                            <th scope="col">10th</th>
                            <th scope="col">11th</th>
                            <th scope="col">12th</th>
                            {{--  <th scope="col">13th</th>
                            <th scope="col">14th</th>  --}}
                            <th scope="col">Total</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($floor['lines'] as $line)
                            {{--  {{ $line['line_name'] }}
                            {{ $line['totals']['first'] }}  --}}
                            <tr>
                                <td>{{ $line['line_name'] }}</td>
                                <td>{{ $line['totals']['day_tar'] }}</td>
                                <td>{{ $line['totals']['hourly_tar'] }}</td>
                                @if ($line['totals']['first'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['first'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['first'] }}</td>
                                    @elseif(($line['totals']['first'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['first'] }}</td>
                                    @elseif(($line['totals']['first'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['first'] }}</td>
                                    @elseif(($line['totals']['first'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['first'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['first'] }}</td>
                                @endif
                                @if ($line['totals']['second'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['second'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['second'] }}</td>
                                    @elseif(($line['totals']['second'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['second'] }}</td>
                                    @elseif(($line['totals']['second'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['second'] }}</td>
                                    @elseif(($line['totals']['second'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['second'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['second'] }}</td>
                                @endif
                                @if ($line['totals']['third'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['third'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['third'] }}</td>
                                    @elseif(($line['totals']['third'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['third'] }}</td>
                                    @elseif(($line['totals']['third'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['third'] }}</td>
                                    @elseif(($line['totals']['third'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['third'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['third'] }}</td>
                                @endif
                                @if ($line['totals']['fourth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['fourth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['fourth'] }}</td>
                                    @elseif(($line['totals']['fourth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['fourth'] }}</td>
                                    @elseif(($line['totals']['fourth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['fourth'] }}</td>
                                    @elseif(($line['totals']['fourth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['fourth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['fourth'] }}</td>
                                @endif
                                @if ($line['totals']['fifth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['fifth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['fifth'] }}</td>
                                    @elseif(($line['totals']['fifth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['fifth'] }}</td>
                                    @elseif(($line['totals']['fifth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['fifth'] }}</td>
                                    @elseif(($line['totals']['fifth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['fifth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['fifth'] }}</td>
                                @endif
                                @if ($line['totals']['sixth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['sixth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['sixth'] }}</td>
                                    @elseif(($line['totals']['sixth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['sixth'] }}</td>
                                    @elseif(($line['totals']['sixth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['sixth'] }}</td>
                                    @elseif(($line['totals']['sixth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['sixth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['sixth'] }}</td>
                                @endif
                                @if ($line['totals']['seventh'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['seventh'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['seventh'] }}</td>
                                    @elseif(($line['totals']['seventh'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['seventh'] }}</td>
                                    @elseif(($line['totals']['seventh'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['seventh'] }}</td>
                                    @elseif(($line['totals']['seventh'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['seventh'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['seventh'] }}</td>
                                @endif
                                @if ($line['totals']['eighth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['eighth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['eighth'] }}</td>
                                    @elseif(($line['totals']['eighth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['eighth'] }}</td>
                                    @elseif(($line['totals']['eighth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['eighth'] }}</td>
                                    @elseif(($line['totals']['eighth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['eighth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['eighth'] }}</td>
                                @endif
                                @if ($line['totals']['ninth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['ninth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['ninth'] }}</td>
                                    @elseif(($line['totals']['ninth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['ninth'] }}</td>
                                    @elseif(($line['totals']['ninth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['ninth'] }}</td>
                                    @elseif(($line['totals']['ninth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['ninth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['ninth'] }}</td>
                                @endif
                                @if ($line['totals']['tenth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['tenth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['tenth'] }}</td>
                                    @elseif(($line['totals']['tenth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['tenth'] }}</td>
                                    @elseif(($line['totals']['tenth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['tenth'] }}</td>
                                    @elseif(($line['totals']['tenth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['tenth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['tenth'] }}</td>
                                @endif
                                @if ($line['totals']['eleventh'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['eleventh'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['eleventh'] }}</td>
                                    @elseif(($line['totals']['eleventh'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['eleventh'] }}</td>
                                    @elseif(($line['totals']['eleventh'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['eleventh'] }}</td>
                                    @elseif(($line['totals']['eleventh'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['eleventh'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['eleventh'] }}</td>
                                @endif
                                @if ($line['totals']['twelfth'] > 0 && $line['totals']['hourly_tar'] > 0)
                                    @if (($line['totals']['twelfth'] / $line['totals']['hourly_tar']) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $line['totals']['twelfth'] }}</td>
                                    @elseif(($line['totals']['twelfth'] / $line['totals']['hourly_tar']) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $line['totals']['twelfth'] }}</td>
                                    @elseif(($line['totals']['twelfth'] / $line['totals']['hourly_tar']) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $line['totals']['twelfth'] }}</td>
                                    @elseif(($line['totals']['twelfth'] / $line['totals']['hourly_tar']) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $line['totals']['twelfth'] }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $line['totals']['twelfth'] }}</td>
                                @endif
                                <td>{{ $line['totals']['first'] + $line['totals']['second'] + $line['totals']['third'] + $line['totals']['fourth'] + $line['totals']['fifth'] + $line['totals']['sixth'] + $line['totals']['seventh'] + $line['totals']['eighth'] + $line['totals']['ninth'] + $line['totals']['tenth'] + $line['totals']['eleventh'] + $line['totals']['twelfth'] }}
                                </td>


                            </tr>
                            <?php $total_sum_today_target += $line['totals']['day_tar']; ?>
                            <?php $total_sum_hourly_target += $line['totals']['hourly_tar']; ?>
                            <?php $total_first += $line['totals']['first']; ?>
                            <?php $total_second += $line['totals']['second']; ?>
                            <?php $total_third += $line['totals']['third']; ?>
                            <?php $total_fourth += $line['totals']['fourth']; ?>
                            <?php $total_fifth += $line['totals']['fifth']; ?>
                            <?php $total_sixth += $line['totals']['sixth']; ?>
                            <?php $total_seventh += $line['totals']['seventh']; ?>
                            <?php $total_eighth += $line['totals']['eighth']; ?>
                            <?php $total_ninth += $line['totals']['ninth']; ?>
                            <?php $total_tenth += $line['totals']['tenth']; ?>
                            <?php $total_eleventh += $line['totals']['eleventh']; ?>
                            <?php $total_twelfth += $line['totals']['twelfth']; ?>

                            <?php $total_total += $line['totals']['first'] + $line['totals']['second'] + $line['totals']['third'] + $line['totals']['fourth'] + $line['totals']['fifth'] + $line['totals']['sixth'] + $line['totals']['seventh'] + $line['totals']['eighth'] + $line['totals']['ninth'] + $line['totals']['tenth'] + $line['totals']['eleventh'] + $line['totals']['twelfth']; ?>

                            {{--  //eighthourrutine day --}}
                            <?php $total_eighthourrutine += $line['totals']['first'] + $line['totals']['second'] + $line['totals']['third'] + $line['totals']['fourth'] + $line['totals']['fifth'] + $line['totals']['sixth'] + $line['totals']['seventh'] + $line['totals']['eighth']; ?>
                            {{--  //fourhour_ot day --}}
                            <?php $total_fourhour_ot += $line['totals']['ninth'] + $line['totals']['tenth'] + $line['totals']['eleventh'] + $line['totals']['twelfth']; ?>
                        @endforeach

                        <tr>

                            <td></td>
                            <td>{{ $total_sum_today_target }}</td>
                            <td>{{ $total_sum_hourly_target }}</td>

                            <td>{{ $total_first }} </td>
                            <td>{{ $total_second }}</td>
                            <td>{{ $total_third }}</td>
                            <td>{{ $total_fourth }}</td>
                            <td>{{ $total_fifth }}</td>
                            <td>{{ $total_sixth }}</td>
                            <td>{{ $total_seventh }}</td>
                            <td>{{ $total_eighth }}</td>
                            <td>{{ $total_ninth }}</td>
                            <td>{{ $total_tenth }}</td>
                            <td>{{ $total_eleventh }}</td>
                            <td>{{ $total_twelfth }}</td>
                            {{--  <td>{{ $thirteenth }}</td>
                            <td>{{ $fourteenth }}</td>  --}}
                            <td>{{ $total_total }}</td>
                        </tr>
                        <td colspan="2" class="text-bold"> Target Achievement of rang of Date:@if ($total_total > 0 && $total_sum_today_target > 0)
                                {{ number_format(($total_total / $total_sum_today_target) * 100, 2) }}%
                            @else
                                {{ number_format(0, 2) }}%
                            @endif
                        </td>
                        <td colspan="3" class="text-bold">Target Achievement in 1st Hour:@if ($total_first > 0 && $total_sum_hourly_target > 0)
                                {{ number_format(($total_first / $total_sum_hourly_target) * 100, 2) }}%
                            @else
                                {{ number_format(0, 2) }}%
                            @endif
                        </td>
                        <td colspan="4" class="text-bold">Target Achievement in 2nd Hour:@if ($total_second > 0 && $total_sum_hourly_target > 0)
                                {{ number_format(($total_second / $total_sum_hourly_target) * 100, 2) }}%
                            @else
                                {{ number_format(0, 2) }}%
                            @endif
                        </td>
                        <td colspan="4" class="text-bold"> Target Achievement after 08 Hours Routine Duty:
                            @if ($total_eighthourrutine > 0 && $total_sum_hourly_target > 0)
                                {{ number_format(($total_eighthourrutine / ($total_sum_hourly_target * 8)) * 100, 2) }}%
                            @else
                                {{ number_format(0, 2) }}%
                            @endif
                        </td>
                        <td colspan="4" class="text-bold"> Target Achievement during 04 Hours OT:@if ($total_fourhour_ot > 0 && $total_sum_hourly_target > 0)
                                {{ number_format(($total_fourhour_ot / ($total_sum_hourly_target * 4)) * 100, 2) }}%
                            @else
                                {{ number_format(0, 2) }}%
                            @endif
                        </td>



                    </tbody>
            </table>
        @else
            <h3 class="text-danger text-center">Data Not Found For Today </h3>
    @endif


    </div>
    @endforeach





    <form action="{{ route('datetodate.summary.export') }}" method="POST">
        @csrf
        {{--  <input hidden type="date" name="start_date" value="{{ $start_date }}" >
    <input hidden type="date" name="end_date" value="{{ $end_date }}" >  --}}
        <input hidden type="date" name="start_date" value="{{ \Carbon\Carbon::parse($start_date)->format('Y-m-d') }}">
<input hidden type="date" name="end_date" value="{{ \Carbon\Carbon::parse($end_date)->format('Y-m-d') }}">


        <button class="btn btn-info mb-4" type="submit">Export Summary</button>
    </form>

















    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>





    <script>
        setTimeout(function() {
            location.reload();
        }, 120000); // 120000 ms = 2 minutes
    </script>
    <script>
        $(document).ready(function() {
            $('#customTable').DataTable({
                "scrollX": true,
                "ordering": false,
                "searching": false,
                "paging": false,
                "info": false,
            });
        });
    </script>

</body>

</html>
