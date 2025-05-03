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

        <div class="row">
            <div class="col-md-9">
                <div class="card card-info">
                    <div class="card-body text-center "
                        style=" background: #66e03a;
background: linear-gradient(90deg, rgba(102, 224, 58, 1) 0%, rgba(237, 83, 204, 1) 0%, rgba(87, 199, 133, 1) 35%, rgba(155, 30, 217, 0.75) 95%);">
                        <h3 class=" text-bold mt-2">Hourly Production Summary</h3>
                        <h3 class=" text-bold mt-2">Line Wise Hourly Production Floor - {{ $floor->name ?? '' }}</h3>
                        <h3 class=" text-bold mt-2">Date: {{ Carbon\Carbon::now()->format('Y-M-d') }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <canvas id="myBarChart" width="200" height="100" style="max-width: 200px ;"></canvas>
            </div>
        </div>
        <div class="col-md-12">
            <table id="customTable" class="table table-striped table-bordered table-sm">
                @if ($floor->hourlyproductions->count())
                    <thead>
                        <tr style="background-color:#110c3b;color:white;font-size:14px !important;">

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
                            <tr style="font-size:14px !important;">

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





    <div class="col-md-12">
        <div class="card ">
            <div class="card-body text-center "
                style=" background: #e03a3a;
background: linear-gradient(90deg, rgba(224, 58, 58, 1) 5%, rgba(0, 0, 255, 1) 55%, rgba(155, 30, 217, 0.75) 95%);">
                <h3 class=" text-bold mt-2">Floor Wise Production Summary</h3>
                <h3 class=" text-bold mt-2">Date: {{ Carbon\Carbon::now()->format('Y-M-d') }}</h3>
            </div>
        </div>
        <table id="customTable" class="table table-striped table-bordered table-sm">

            <thead>
                <tr
                    style="background: #2A7B9B;
background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);font-size:14px;">
                    <th scope="col">Floor Name</th>
                    <th scope="col">Today Target Sum</th>
                    <th scope="col">Today Achievement Sum</th>
                    <th scope="col">Today Target Achievement %</th>
                    <th scope="col">Hourly Target Sum</th>
                    <th scope="col">First Hour Achievement Sum </th>
                    <th scope="col">First Hour Achievement %</th>
                    <th scope="col">Second Hour Achievement Sum </th>
                    <th scope="col">Second Hour Achievement %</th>
                    <th scope="col">8 Hour Achievement %</th>
                    <th scope="col">4 Hour Achievement %</th>
                </tr>

            </thead>
            <?php $sum_Floor_today_target = 0; ?>
            <?php $sum_Floor_today_achievement = 0; ?>
            <?php $sum_Floor_hourly_target = 0; ?>
            <?php $sum_Floor_twelfth_achievement = 0; ?>
            <?php $sum_Floor_first_achievement = 0; ?>
            <?php $sum_Floor_second_achievement = 0; ?>
            <?php $sum_Floor_eight_achievement = 0; ?>
            <?php $sum_Floor_ot_achievement = 0; ?>
            <?php $avrg = 0; ?>
            <?php $avrg_fristhour = 0; ?>
            <?php $avrg_secondhour = 0; ?>
            <?php $sum_allfloor_second_achievement = 0; ?>
            <?php $avrg_eighthour = 0; ?>
            <?php $avrg_othour = 0; ?>
            <tbody>
                @foreach ($productions as $floor)
                    @if ($floor->hourlyproductions->count())
                        <?php $sum_floor_day_tar = $floor->hourlyproductions->sum('day_tar'); ?>
                        <?php $sum_floor_day_achievement = $floor->hourlyproductions->sum(function ($total) {
                            return (float) $total->first + $total->second + $total->third + $total->fourth + $total->fifth + $total->sixth + $total->seventh + $total->eighth + $total->ninth + $total->tenth + $total->eleventh + $total->twelfth;
                        }); ?>
                        <?php $sum_floor_hourly_tar = $floor->hourlyproductions->sum('hourly_tar'); ?>
                        <?php $sum_floor_first_achievement = $floor->hourlyproductions->sum('first'); ?>
                        <?php $sum_floor_second_achievement = $floor->hourlyproductions->sum('second'); ?>
                        <?php $sum_floor_eight_achievement = $floor->hourlyproductions->sum(function ($total) {
                            return (float) $total->first + $total->second + $total->third + $total->fourth + $total->fifth + $total->sixth + $total->seventh + $total->eighth;
                        }); ?>
                        <?php $sum_floor_ot_achievement = $floor->hourlyproductions->sum(function ($total) {
                            return (float) $total->ninth + $total->tenth + $total->eleventh + $total->twelfth;
                        }); ?>
                        {{--  //grand total  --}}
                        <?php $sum_Floor_today_target += $sum_floor_day_tar; ?>
                        <?php $sum_Floor_today_achievement += $sum_floor_day_achievement; ?>
                        <?php $sum_Floor_hourly_target += $sum_floor_hourly_tar; ?>
                        <?php $sum_Floor_first_achievement += $sum_floor_first_achievement; ?>
                        <?php $avrg += number_format((float) ($sum_floor_day_achievement / $sum_floor_day_tar) * 100, 2); ?>
                        <?php $avrg_fristhour += number_format(($sum_floor_first_achievement / $sum_floor_hourly_tar) * 100, 2); ?>
                        <?php $avrg_secondhour += number_format(($sum_floor_second_achievement / $sum_floor_hourly_tar) * 100, 2); ?>
                        <?php $sum_allfloor_second_achievement += $sum_floor_second_achievement; ?>
                        <?php $avrg_eighthour += number_format(($sum_floor_eight_achievement / ($sum_floor_hourly_tar * 8)) * 100, 2); ?>
                        <?php $avrg_othour += number_format(($sum_floor_ot_achievement / ($sum_floor_hourly_tar * 4)) * 100, 2); ?>

                        <tr>
                            <td>{{ $floor->name }}</td>
                            <td>{{ $sum_floor_day_tar }}</td>
                            <td>
                                {{ $sum_floor_day_achievement }}
                            </td>
                            <td>
                                {{ number_format(($sum_floor_day_achievement / $sum_floor_day_tar) * 100, 2) }}%
                            </td>
                            <td>
                                {{ number_format($sum_floor_hourly_tar) }}

                            </td>
                            <td> {{ number_format($sum_floor_first_achievement) }}</td>
                            <td> {{ number_format(($sum_floor_first_achievement / $sum_floor_hourly_tar) * 100, 2) }}%
                            </td>
                            <td> {{ number_format($sum_floor_second_achievement) }}</td>
                            <td> {{ number_format(($sum_floor_second_achievement / $sum_floor_hourly_tar) * 100, 2) }}%
                            </td>
                            <td> {{ number_format(($sum_floor_eight_achievement / ($sum_floor_hourly_tar * 8)) * 100, 2) }}%
                            </td>
                            <td> {{ number_format(($sum_floor_ot_achievement / ($sum_floor_hourly_tar * 4)) * 100, 2) }}%
                            </td>

                        </tr>
                    @endif
                @endforeach
                <tr class="bg-green">
                    <td>Grand Total</td>
                    <td>{{ $sum_Floor_today_target }}</td>
                    <td>{{ $sum_Floor_today_achievement }}</td>
                    <td>{{ number_format($avrg / $productions->count(), 2) }}%</td>
                    <td>{{ $sum_Floor_hourly_target }}</td>
                    <td>{{ $sum_Floor_first_achievement }}</td>
                    <td>{{ number_format($avrg_fristhour / $productions->count(), 2) }}%</td>
                    <td>{{ $sum_allfloor_second_achievement }}</td>
                    <td>{{ number_format($avrg_secondhour / $productions->count(), 2) }}%</td>
                    <td>{{ number_format($avrg_eighthour / $productions->count(), 2) }}%</td>
                    <td>{{ number_format($avrg_othour / $productions->count(), 2) }}%</td>
                </tr>
            </tbody>

        </table>




    </div>

    <div class="col-md-12">
        <div class="card ">
            <div class="card-body text-center "
                style=" background: #e03a3a;
background: linear-gradient(90deg, rgba(224, 58, 58, 1) 5%, rgba(0, 0, 255, 1) 55%, rgba(155, 30, 217, 0.75) 95%);">
                <h3 class=" text-bold mt-2">Floor Wise Production Summary</h3>
                <h3 class=" text-bold mt-2">Date: {{ Carbon\Carbon::now()->format('Y-M-d') }}</h3>
            </div>
        </div>
        <table id="customTable" class="table table-striped table-bordered table-sm">

            <thead>
                <tr
                    style="background: #2A7B9B;
background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);font-size:14px;">
                    <th scope="col">Floor Name</th>
                    <th scope="col">Today Target Sum</th>
                    <th scope="col">Today Achievement Sum</th>
                    <th scope="col">Today Target Achievement %</th>
                    <th scope="col">Hourly Target Sum</th>
                    <th scope="col">First Hour Achievement Sum </th>
                    <th scope="col">First Hour Achievement %</th>
                    <th scope="col">Second Hour Achievement Sum </th>
                    <th scope="col">Second Hour Achievement %</th>
                    <th scope="col">8 Hour Achievement %</th>
                    <th scope="col">4 Hour Achievement %</th>
                </tr>

            </thead>
            <?php $sum_Floor_today_target = 0; ?>
            <?php $sum_Floor_today_achievement = 0; ?>
            <?php $sum_Floor_hourly_target = 0; ?>
            <?php $sum_Floor_twelfth_achievement = 0; ?>
            <?php $sum_Floor_first_achievement = 0; ?>
            <?php $sum_Floor_second_achievement = 0; ?>
            <?php $sum_Floor_eight_achievement = 0; ?>
            <?php $sum_Floor_ot_achievement = 0; ?>
            <?php $avrg = 0; ?>
            <?php $avrg_fristhour = 0; ?>
            <?php $avrg_secondhour = 0; ?>
            <?php $sum_allfloor_second_achievement = 0; ?>
            <?php $avrg_eighthour = 0; ?>
            <?php $avrg_othour = 0; ?>
            <tbody>
                @foreach ($excludebrandfloorproductions as $floor)
                    @if ($floor->hourlyproductions->count())
                        <?php $sum_floor_day_tar = $floor->hourlyproductions->sum('day_tar'); ?>
                        <?php $sum_floor_day_achievement = $floor->hourlyproductions->sum(function ($total) {
                            return (float) $total->first + $total->second + $total->third + $total->fourth + $total->fifth + $total->sixth + $total->seventh + $total->eighth + $total->ninth + $total->tenth + $total->eleventh + $total->twelfth;
                        }); ?>
                        <?php $sum_floor_hourly_tar = $floor->hourlyproductions->sum('hourly_tar'); ?>
                        <?php $sum_floor_first_achievement = $floor->hourlyproductions->sum('first'); ?>
                        <?php $sum_floor_second_achievement = $floor->hourlyproductions->sum('second'); ?>
                        <?php $sum_floor_eight_achievement = $floor->hourlyproductions->sum(function ($total) {
                            return (float) $total->first + $total->second + $total->third + $total->fourth + $total->fifth + $total->sixth + $total->seventh + $total->eighth;
                        }); ?>
                        <?php $sum_floor_ot_achievement = $floor->hourlyproductions->sum(function ($total) {
                            return (float) $total->ninth + $total->tenth + $total->eleventh + $total->twelfth;
                        }); ?>
                        {{--  //grand total  --}}
                        <?php $sum_Floor_today_target += $sum_floor_day_tar; ?>
                        <?php $sum_Floor_today_achievement += $sum_floor_day_achievement; ?>
                        <?php $sum_Floor_hourly_target += $sum_floor_hourly_tar; ?>
                        <?php $sum_Floor_first_achievement += $sum_floor_first_achievement; ?>
                        <?php $avrg += number_format((float) ($sum_floor_day_achievement / $sum_floor_day_tar) * 100, 2); ?>
                        <?php $avrg_fristhour += number_format(($sum_floor_first_achievement / $sum_floor_hourly_tar) * 100, 2); ?>
                        <?php $avrg_secondhour += number_format(($sum_floor_second_achievement / $sum_floor_hourly_tar) * 100, 2); ?>
                        <?php $sum_allfloor_second_achievement += $sum_floor_second_achievement; ?>
                        <?php $avrg_eighthour += number_format(($sum_floor_eight_achievement / ($sum_floor_hourly_tar * 8)) * 100, 2); ?>
                        <?php $avrg_othour += number_format(($sum_floor_ot_achievement / ($sum_floor_hourly_tar * 4)) * 100, 2); ?>

                        <tr>
                            <td>{{ $floor->name }}</td>
                            <td>{{ $sum_floor_day_tar }}</td>
                            <td>
                                {{ $sum_floor_day_achievement }}
                            </td>
                            <td>
                                {{ number_format(($sum_floor_day_achievement / $sum_floor_day_tar) * 100, 2) }}%
                            </td>
                            <td>
                                {{ number_format($sum_floor_hourly_tar) }}

                            </td>
                            <td> {{ number_format($sum_floor_first_achievement) }}</td>
                            <td> {{ number_format(($sum_floor_first_achievement / $sum_floor_hourly_tar) * 100, 2) }}%
                            </td>
                            <td> {{ number_format($sum_floor_second_achievement) }}</td>
                            <td> {{ number_format(($sum_floor_second_achievement / $sum_floor_hourly_tar) * 100, 2) }}%
                            </td>
                            <td> {{ number_format(($sum_floor_eight_achievement / ($sum_floor_hourly_tar * 8)) * 100, 2) }}%
                            </td>
                            <td> {{ number_format(($sum_floor_ot_achievement / ($sum_floor_hourly_tar * 4)) * 100, 2) }}%
                            </td>

                        </tr>
                    @endif
                @endforeach
                <tr class="bg-green">
                    <td>Grand Total</td>
                    <td>{{ $sum_Floor_today_target }}</td>
                    <td>{{ $sum_Floor_today_achievement }}</td>
                    <td>{{ number_format($avrg / $productions->count(), 2) }}%</td>
                    <td>{{ $sum_Floor_hourly_target }}</td>
                    <td>{{ $sum_Floor_first_achievement }}</td>
                    <td>{{ number_format($avrg_fristhour / $productions->count(), 2) }}%</td>
                    <td>{{ $sum_allfloor_second_achievement }}</td>
                    <td>{{ number_format($avrg_secondhour / $productions->count(), 2) }}%</td>
                    <td>{{ number_format($avrg_eighthour / $productions->count(), 2) }}%</td>
                    <td>{{ number_format($avrg_othour / $productions->count(), 2) }}%</td>
                </tr>
            </tbody>

        </table>




    </div>




























    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = [120, 100, 75, 45, ]; // percentage values
        const labels = ['Over', 'Met', 'Not Met', 'Below', ];
        const backgroundColors = data.map(value => {
            if (value > 100) return 'blue';
            if (value === 100) return 'green';
            if (value > 50) return 'yellow';
            return 'red';
        });

        const ctx = document.getElementById('myBarChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: backgroundColors,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false // hides the label
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 150
                    }
                }
            }
        });
    </script>

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
