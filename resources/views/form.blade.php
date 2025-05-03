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
        <div class="row mb-2">
            <div class="col-sm-12">
                <div class="card card-info">

                    <div class="card-header text-center">
                        <h3 class=" text-bold mt-2">Hourly Production Create</h3>
                        <input type="hidden" name="floor_id" value="{{ $floor->id }}">
                        <h3 class=" text-bold mt-2">Floor: {{ $floor->name ?? '' }}</h3>
                        <h3 class=" text-bold mt-2">Date: {{ Carbon\Carbon::now()->format('Y-M-D') }}</h3>
                        <h3 class=" text-bold mt-2">Time: {{ Carbon\Carbon::now()->format('h:i:s') }}</h3>
                    </div>
                    <div class="card-body">

                        <table class="table table-striped datatable table-bordered">
                            <thead>
                                <tr>
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
                                    <th scope="col">Remarks</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lines as $line)
                                    <tr>
                                        <td> {{ $line->name }}<input value="{{ $line->id }}"
                                                style="max-width:65px;" type="hidden" readonly name="line_id[]"></td>
                                        <td><input style="max-width:65px;" type="text" name="buyer[]"></td>
                                        <td><input style="max-width:65px;" type="text" name="style[]"></td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="day_tar[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="hourly_tar[]"></td>
                                        <td cope="col"><input style="max-width:55px;" type="number" name="first[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="second[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number" name="third[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="fourth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number" name="fifth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number" name="sixth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="seventh[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="eighth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="ninth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="tenth[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="eleventh[]">
                                        </td>
                                        <td cope="col"><input style="max-width:55px;" type="number"
                                                name="twelfth[]">
                                        </td>
                                        {{--  it off if you want to insert data in to in tow row than commentout --}}
                                        {{--  <td cope="col"><input style="max-width:55px;" type="number"
                                                    name="thirteenth[]">
                                            </td>
                                            <td cope="col"><input style="max-width:55px;" type="number"
                                                    name="fourteenth[]">
                                            </td>  --}}
                                        <td cope="col"><input style="max-width:100px;" type="text"
                                                name="remark[]">
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info ">Submit</button>
                    </div>


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
           url: "{{route('addhourlyproduction')}}",
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
