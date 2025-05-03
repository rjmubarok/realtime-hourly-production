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


        <div class="col-md-12">


            <div class="card card-info d-flex justify-content-between">
                <div class="card-body text-center " style=" background-color: lightblue;">
                    <h3 class=" text-bold mt-2">Hourly Production Summary</h3>

                    <h3 class=" text-bold mt-2">Line Wise Hourly Production Floor - {{ $floor->name ?? '' }}</h3>
                    <h3 class=" text-bold mt-2">Date: {{ $today }}</h3>






                </div>
            </div>
            <table id="customTable" class="table table-striped table-bordered table-sm">
                @if ($floor->hourlyproductions->count())
                    <thead>
                        <tr style="background-color:#110c3b;color:white;font-size:18px;">

                            <th scope="col">Line Name</th>
                            <th scope="col">Buyer Name</th>
                            <th scope="col">Style Name</th>
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
                            <th scope="col">Remarks</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($floor->hourlyproductions as $production)
                            <tr>

                                <td> {{ $production->line->name ?? '' }}</td>
                                <td> {{ $production->buyer }} </td>
                                <td> {{ $production->style }} </td>
                                <td cope="col">{{ $production->day_tar }}
                                </td>
                                <td cope="col">{{ $production->hourly_tar }}
                                </td>
                                @if ($production->first > 0 && $production->hourly_tar > 0)
                                    @if (($production->first / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->first }}</td>
                                    @elseif(($production->first / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->first }}</td>
                                    @elseif(($production->first / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->first }}</td>
                                    @elseif(($production->first / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->first }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->first }}</td>
                                @endif


                                @if ($production->second > 0 && $production->hourly_tar > 0)
                                    @if (($production->second / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->second }}</td>
                                    @elseif(($production->second / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->second }}</td>
                                    @elseif(($production->second / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->second }}</td>
                                    @elseif(($production->second / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->second }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->second }}</td>
                                @endif
                                @if ($production->third > 0 && $production->hourly_tar > 0)
                                    @if (($production->third / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->third }}</td>
                                    @elseif(($production->third / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->third }}</td>
                                    @elseif(($production->third / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->third }}</td>
                                    @elseif(($production->third / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->third }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->third }}</td>
                                @endif
                                @if ($production->fourth > 0 && $production->hourly_tar > 0)
                                    @if (($production->fourth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->fourth }}</td>
                                    @elseif(($production->fourth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->fourth }}</td>
                                    @elseif(($production->fourth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->fourth }}</td>
                                    @elseif(($production->fourth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->fourth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->fourth }}</td>
                                @endif
                                @if ($production->fifth > 0 && $production->hourly_tar > 0)
                                    @if (($production->fifth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->fifth }}</td>
                                    @elseif(($production->fifth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->fifth }}</td>
                                    @elseif(($production->fifth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->fifth }}</td>
                                    @elseif(($production->fifth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->fifth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->fifth }}</td>
                                @endif
                                @if ($production->sixth > 0 && $production->hourly_tar > 0)
                                    @if (($production->sixth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->sixth }}</td>
                                    @elseif(($production->sixth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->sixth }}</td>
                                    @elseif(($production->sixth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->sixth }}</td>
                                    @elseif(($production->sixth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->sixth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->sixth }}</td>
                                @endif
                                @if ($production->seventh > 0 && $production->hourly_tar > 0)
                                    @if (($production->seventh / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->seventh }}</td>
                                    @elseif(($production->seventh / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->seventh }}</td>
                                    @elseif(($production->seventh / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->seventh }}</td>
                                    @elseif(($production->seventh / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->seventh }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->seventh }}</td>
                                @endif
                                @if ($production->eighth > 0 && $production->hourly_tar > 0)
                                    @if (($production->eighth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->eighth }}</td>
                                    @elseif(($production->eighth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->eighth }}</td>
                                    @elseif(($production->eighth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->eighth }}</td>
                                    @elseif(($production->eighth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->eighth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->eighth }}</td>
                                @endif
                                @if ($production->ninth > 0 && $production->hourly_tar > 0)
                                    @if (($production->ninth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->ninth }}</td>
                                    @elseif(($production->ninth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->ninth }}</td>
                                    @elseif(($production->ninth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->ninth }}</td>
                                    @elseif(($production->ninth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->ninth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->ninth }}</td>
                                @endif
                                @if ($production->tenth > 0 && $production->hourly_tar > 0)
                                    @if (($production->tenth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->tenth }}</td>
                                    @elseif(($production->tenth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->tenth }}</td>
                                    @elseif(($production->tenth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->tenth }}</td>
                                    @elseif(($production->tenth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->tenth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->tenth }}</td>
                                @endif
                                @if ($production->eleventh > 0 && $production->hourly_tar > 0)
                                    @if (($production->eleventh / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->eleventh }}</td>
                                    @elseif(($production->eleventh / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->eleventh }}</td>
                                    @elseif(($production->eleventh / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->eleventh }}</td>
                                    @elseif(($production->eleventh / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->eleventh }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->eleventh }}</td>
                                @endif

                                @if ($production->twelfth > 0 && $production->hourly_tar > 0)
                                    @if (($production->twelfth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" class="bg-red">{{ $production->twelfth }}</td>
                                    @elseif(($production->twelfth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" class="bg-yellow">{{ $production->twelfth }}</td>
                                    @elseif(($production->twelfth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" class="bg-green">{{ $production->twelfth }}</td>
                                    @elseif(($production->twelfth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col" class="bg-blue">{{ $production->twelfth }}</td>
                                    @endif
                                @else
                                    <td cope="col" class="bg-red">{{ $production->twelfth }}</td>
                                @endif

                                {{--  @if ($production->thirteenth > 0 && $production->hourly_tar > 0)
                                @if (($production->thirteenth / $production->hourly_tar) * 100 <= 50)
                                     <td cope="col" class="bg-red">{{ $production->thirteenth }}</td>
                                @elseif((($production->thirteenth/$production->hourly_tar)* 100)  <= 99)
                                     <td cope="col" class="bg-yellow">{{ $production->thirteenth }}</td>
                                @elseif((($production->thirteenth/$production->hourly_tar)* 100)  == 100)
                                     <td cope="col" class="bg-green">{{ $production->thirteenth }}</td>
                                @elseif((($production->thirteenth/$production->hourly_tar)* 100)  >= 100)
                                     <td cope="col" class="bg-blue">{{ $production->thirteenth }}</td>

                                @endif
                                 @else
                           <td cope="col" class="bg-red">{{ $production->thirteenth }}</td>
                            @endif
                            @if ($production->fourteenth > 0 && $production->hourly_tar > 0)
                                @if (($production->fourteenth / $production->hourly_tar) * 100 <= 50)
                                     <td cope="col" class="bg-red">{{ $production->fourteenth }}</td>
                                @elseif((($production->fourteenth/$production->hourly_tar)* 100)  <= 99)
                                     <td cope="col" class="bg-yellow">{{ $production->fourteenth }}</td>
                                @elseif((($production->fourteenth/$production->hourly_tar)* 100)  == 100)
                                     <td cope="col" class="bg-green">{{ $production->fourteenth }}</td>
                                @elseif((($production->fourteenth/$production->hourly_tar)* 100)  >= 100)
                                     <td cope="col" class="bg-blue">{{ $production->fourteenth }}</td>

                                @endif
                                 @else
                           <td cope="col" class="bg-red">{{ $production->fourteenth }}</td>
                            @endif  --}}
                                <td>{{ $production->first + $production->second + $production->third + $production->fourth + $production->fifth + $production->sixth + $production->seventh + $production->eighth + $production->ninth + $production->tenth + $production->eleventh + $production->twelfth + $production->thirteenth + $production->fourteenth }}
                                </td>
                                <td>{{ $production->remark }}
                                </td>
                            </tr>

                            <?php $sum_today_target += $production->day_tar; ?>
                            <?php $sum_hourly_target += $production->hourly_tar; ?>
                            <?php $first += $production->first; ?>
                            <?php $second += $production->second; ?>
                            <?php $third += $production->third; ?>
                            <?php $fourth += $production->fourth; ?>
                            <?php $fifth += $production->fifth; ?>
                            <?php $sixth += $production->sixth; ?>
                            <?php $seventh += $production->seventh; ?>
                            <?php $eighth += $production->eighth; ?>
                            <?php $ninth += $production->ninth; ?>
                            <?php $tenth += $production->tenth; ?>
                            <?php $eleventh += $production->eleventh; ?>
                            <?php $twelfth += $production->twelfth; ?>
                            <?php $thirteenth += $production->thirteenth; ?>
                            <?php $fourteenth += $production->fourteenth; ?>
                            <?php $total += $production->first + $production->second + $production->third + $production->fourth + $production->fifth + $production->sixth + $production->seventh + $production->eighth + $production->ninth + $production->tenth + $production->eleventh + $production->twelfth + $production->thirteenth + $production->fourteenth; ?>

                            {{--  //eighthourrutine day --}}
                            <?php $eighthourrutine += $production->first + $production->second + $production->third + $production->fourth + $production->fifth + $production->sixth + $production->seventh + $production->eighth; ?>
                            {{--  //fourhour_ot day --}}
                            <?php $fourhour_ot += $production->ninth + $production->tenth + $production->eleventh + $production->twelfth + $production->thirteenth + $production->fourteenth; ?>
                        @endforeach
                        <tr>
                            <td>
                            </td>




                            <td>
                            </td>
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
                            {{--  <td>{{ $thirteenth }}</td>
                            <td>{{ $fourteenth }}</td>  --}}
                            <td>{{ $total }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-bold"> Target Achievement of the Day:@if ($total > 0 && $sum_today_target > 0)
                                    {{ number_format(($total / $sum_today_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4" class="text-bold">Target Achievement in 1st Hour:@if ($first > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($first / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4" class="text-bold">Target Achievement in 2nd Hour:@if ($second > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($second / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4" class="text-bold"> Target Achievement after 08 Hours Routine Duty:
                                @if ($eighthourrutine > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($eighthourrutine / ($sum_hourly_target * 8)) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4" class="text-bold"> Target Achievement during 04 Hours OT:@if ($fourhour_ot > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($fourhour_ot / ($sum_hourly_target * 4)) * 100, 2) }}%
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
