


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


    



          
               
                    <h3 style="text-align: center;">Hourly Production Summary</h3>
                    <h3 style="text-align: center;">Line Wise Hourly Production Floor - {{ $floor->name ?? '' }}</h3>
                    <h3 style="text-align: center;">Date: {{ $date }}</h3>






                
        <table border="1" cellpadding="5" cellspacing="0">
                @if ($floor->hourlyproductions->count())
                    <thead>
                        <tr >

                            <th >Line Name</th>
                            <th >Buyer Name</th>
                            <th >Style Name</th>
                            <th >Today Target</th>
                            <th >Hourly Target</th>
                            <th >1st</th>
                            <th >2nd</th>
                            <th >3rd</th>
                            <th >4th</th>
                            <th >5th</th>
                            <th >6th</th>
                            <th >7th</th>
                            <th >8th</th>
                            <th >9th</th>
                            <th >10th</th>
                            <th >11th</th>
                            <th >12th</th>
                        
                            <th >Total</th>
                            <th >Remarks</th>
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
                                        <td cope="col" style="background-color:red;">{{ $production->first }}</td>
                                    @elseif(($production->first / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->first }}</td>
                                    @elseif(($production->first / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->first }}</td>
                                    @elseif(($production->first / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->first }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->first }}</td>
                                @endif


                                @if ($production->second > 0 && $production->hourly_tar > 0)
                                    @if (($production->second / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->second }}</td>
                                    @elseif(($production->second / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->second }}</td>
                                    @elseif(($production->second / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->second }}</td>
                                    @elseif(($production->second / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->second }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->second }}</td>
                                @endif
                                @if ($production->third > 0 && $production->hourly_tar > 0)
                                    @if (($production->third / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->third }}</td>
                                    @elseif(($production->third / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->third }}</td>
                                    @elseif(($production->third / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->third }}</td>
                                    @elseif(($production->third / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->third }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->third }}</td>
                                @endif
                                @if ($production->fourth > 0 && $production->hourly_tar > 0)
                                    @if (($production->fourth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->fourth }}</td>
                                    @elseif(($production->fourth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->fourth }}</td>
                                    @elseif(($production->fourth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->fourth }}</td>
                                    @elseif(($production->fourth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->fourth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->fourth }}</td>
                                @endif
                                @if ($production->fifth > 0 && $production->hourly_tar > 0)
                                    @if (($production->fifth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->fifth }}</td>
                                    @elseif(($production->fifth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->fifth }}</td>
                                    @elseif(($production->fifth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->fifth }}</td>
                                    @elseif(($production->fifth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->fifth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->fifth }}</td>
                                @endif
                                @if ($production->sixth > 0 && $production->hourly_tar > 0)
                                    @if (($production->sixth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->sixth }}</td>
                                    @elseif(($production->sixth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->sixth }}</td>
                                    @elseif(($production->sixth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->sixth }}</td>
                                    @elseif(($production->sixth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->sixth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->sixth }}</td>
                                @endif
                                @if ($production->seventh > 0 && $production->hourly_tar > 0)
                                    @if (($production->seventh / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->seventh }}</td>
                                    @elseif(($production->seventh / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->seventh }}</td>
                                    @elseif(($production->seventh / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->seventh }}</td>
                                    @elseif(($production->seventh / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->seventh }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->seventh }}</td>
                                @endif
                                @if ($production->eighth > 0 && $production->hourly_tar > 0)
                                    @if (($production->eighth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->eighth }}</td>
                                    @elseif(($production->eighth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->eighth }}</td>
                                    @elseif(($production->eighth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->eighth }}</td>
                                    @elseif(($production->eighth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->eighth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->eighth }}</td>
                                @endif
                                @if ($production->ninth > 0 && $production->hourly_tar > 0)
                                    @if (($production->ninth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->ninth }}</td>
                                    @elseif(($production->ninth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->ninth }}</td>
                                    @elseif(($production->ninth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->ninth }}</td>
                                    @elseif(($production->ninth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->ninth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->ninth }}</td>
                                @endif
                                @if ($production->tenth > 0 && $production->hourly_tar > 0)
                                    @if (($production->tenth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->tenth }}</td>
                                    @elseif(($production->tenth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->tenth }}</td>
                                    @elseif(($production->tenth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->tenth }}</td>
                                    @elseif(($production->tenth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->tenth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->tenth }}</td>
                                @endif
                                @if ($production->eleventh > 0 && $production->hourly_tar > 0)
                                    @if (($production->eleventh / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->eleventh }}</td>
                                    @elseif(($production->eleventh / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->eleventh }}</td>
                                    @elseif(($production->eleventh / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->eleventh }}</td>
                                    @elseif(($production->eleventh / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->eleventh }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->eleventh }}</td>
                                @endif

                                @if ($production->twelfth > 0 && $production->hourly_tar > 0)
                                    @if (($production->twelfth / $production->hourly_tar) * 100 <= 50)
                                        <td cope="col" style="background-color:red;">{{ $production->twelfth }}</td>
                                    @elseif(($production->twelfth / $production->hourly_tar) * 100 <= 99)
                                        <td cope="col" style="background-color:yellow;">{{ $production->twelfth }}</td>
                                    @elseif(($production->twelfth / $production->hourly_tar) * 100 == 100)
                                        <td cope="col" style="background-color:green;">{{ $production->twelfth }}</td>
                                    @elseif(($production->twelfth / $production->hourly_tar) * 100 >= 100)
                                        <td cope="col"style="background-color:blue;">{{ $production->twelfth }}</td>
                                    @endif
                                @else
                                    <td cope="col" style="background-color:red;">{{ $production->twelfth }}</td>
                                @endif

                               
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
                          
                            <td>{{ $total }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"> Target Achievement of the Day:@if ($total > 0 && $sum_today_target > 0)
                                    {{ number_format(($total / $sum_today_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4">Target Achievement in 1st Hour:@if ($first > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($first / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4">Target Achievement in 2nd Hour:@if ($second > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($second / $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4"> Target Achievement after 08 Hours Routine Duty:
                                @if ($eighthourrutine > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($eighthourrutine / ($sum_hourly_target * 8)) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>
                            <td colspan="4"> Target Achievement during 04 Hours OT:@if ($fourhour_ot > 0 && $sum_hourly_target > 0)
                                    {{ number_format(($fourhour_ot / ($sum_hourly_target * 4)) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                            </td>

                    </tbody>
            </table>
        @else
            <h3 style="background-color:blue;">Data Not Found For Today </h3>
    @endif


    @endforeach
























