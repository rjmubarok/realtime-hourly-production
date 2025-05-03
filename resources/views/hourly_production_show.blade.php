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
    <form id="productionForm" enctype="multipart/form-data">
        @csrf
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
                <div class="card card-info" style="">
                    <div class="card-body">

                        <table class="table   table-bordered">
                            <thead>
                                <tr >
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
                                    {{--  it off if you want to insert data in to in tow row than commentout --}}
                                    {{--  <th scope="col">13th</th>
                                    <th scope="col">14th</th>  --}}
                                    <th scope="col">Total</th>
                                    <th scope="col">Remarks</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productions as $production)
                                    <tr>
                                        <input type="hidden" name="id[]" value="{{ $production->id }}">
                                        <td> {{ $production->line->name ?? '' }}<input
                                                value="{{ $production->line_id }} " style="max-width:65px;"
                                                type="hidden" name="line_id[]"></td>
                                        <td><input value="{{ $production->buyer }}" style="max-width:65px;"
                                                type="text" name="buyer[]"></td>
                                        <td><input value="{{ $production->style }}" style="max-width:65px;"
                                                type="text" name="style[]"></td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->day_tar }}" type="number" name="day_tar[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->hourly_tar }}" type="number"
                                                name="hourly_tar[]"></td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->first }}" type="number" name="first[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->second }}" type="number" name="second[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->third }}" type="number" name="third[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->fourth }}" type="number" name="fourth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->fifth }}" type="number" name="fifth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->sixth }}" type="number" name="sixth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->seventh }}" type="number" name="seventh[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->eighth }}" type="number" name="eighth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->ninth }}" type="number" name="ninth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->tenth }}" type="number" name="tenth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->eleventh }}" type="number"
                                                name="eleventh[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->twelfth }}" type="number" name="twelfth[]">
                                        </td>
                                        {{--  it off if you want to insert data in to in tow row than commentout --}}
                                        {{--  <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->thirteenth }}" type="number"
                                                name="thirteenth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;"
                                                value="{{ $production->fourteenth }}" type="number"
                                                name="fourteenth[]">
                                        </td>  --}}
                                        <td>{{ $production->first + $production->second + $production->third + $production->fourth + $production->fifth + $production->sixth + $production->seventh + $production->eighth + $production->ninth + $production->tenth + $production->eleventh + $production->twelfth + $production->thirteenth + $production->fourteenth }}
                                        </td>
                                        <td cope="col"><input style="max-width:100px;"
                                                value="{{ $production->remark }}" type="text"
                                                name="remark[]">
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $sum_today_target }}</td>
                                    <td>{{ $sum_hourly_target }}</td>
                                    {{--  <td>{{ number_format($sum_hourly_target/$first*100, 2) }}</td>  --}}
                                    <td>{{ $first }}</td>
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
                            </tbody>




                    </div>
                </div>

                <div class="col-md-12" style=" background-color: lightblue;">
                    <div class="card card-info" style=" background-color: lightblue;">
                        <div class="card-body text-center ">
                            <h3 class=" text-bold mt-2">Hourly Production Show</h3>
                            <input type="hidden" name="floor_id" value="{{ $floor->id }}">
                            <h3 class=" text-bold mt-2">Floor: {{ $floor->name ?? '' }}</h3>
                            <h3 class=" text-bold mt-2">Date: {{ Carbon\Carbon::now()->format('Y-M-d') }}</h3>
                            <h3 class=" text-bold mt-2">Time: {{ Carbon\Carbon::now()->format('h:i:s') }}</h3>
                            <h3 class=" text-bold mt-2">Target Achievement in 1st Hour:
                                @if ($first > 0 && $sum_hourly_target > 0)

                                    {{ number_format(($first/ $sum_hourly_target) * 100, 2) }}%
                                @else
                                    {{ number_format(0, 2) }}%
                                @endif
                                <h3 class=" text-bold mt-2">Target Achievement in 2nd Hour:

                                    @if ($second > 0 && $sum_hourly_target > 0)
                                        {{ number_format(($second / $sum_hourly_target) * 100, 2) }}%

                                    @else
                                        {{ number_format(0, 2) }}%
                                    @endif

                                </h3>
                                <h3 class=" text-bold mt-2"> Target Achievement after 08 Hours Routine Duty:
                                    @if ($eighthourrutine > 0 && $sum_hourly_target > 0)
                                        {{ number_format(( $eighthourrutine/ ($sum_hourly_target*8)) * 100, 2) }}%
                                    @else
                                        {{ number_format(0, 2) }}%
                                    @endif
                                </h3>


                                <h3 class=" text-bold mt-2"> Target Achievement during 04 Hours OT:
                                    @if ($fourhour_ot > 0 && $sum_hourly_target > 0)
                                         {{ number_format(( $fourhour_ot/ ($sum_hourly_target*4)) * 100, 2) }}%


                                    @else
                                        {{ number_format(0, 2) }}%
                                    @endif
                                </h3>
                                <h3 class=" text-bold mt-2"> Target Achievement of the Day:
                                    @if ($total > 0 && $sum_today_target > 0)
                                        {{ number_format(($total / $sum_today_target) * 100, 2) }}%

                                    @else
                                        {{ number_format(0, 2) }}%
                                    @endif
                                </h3>



                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info ">Update </button>
                </div>
            </div>

        </div>

    </form>







    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $('#productionForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
           url: "{{route('updatehourlyproduction')}}",
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.success,
                    timer: 2000,
                    showConfirmButton: false
                });
                $('#productionForm')[0].reset();
            },
            error: function (xhr) {
                var response = xhr.responseJSON;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                       text: response.error,
                    });

            }
        });
    });
</script>






</body>

</html>
