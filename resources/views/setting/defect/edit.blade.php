@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info">
                <form action="{{ route('defectUpdate', $single_data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Defect Code Edit</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-content-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="floor_id">Select Floor Name</label>
                                <select class="form-control" name="floor_id" id="floor_id">
                                    <option selected>Select Floor</option>
                                    @foreach($floors as $floor)
                                        <option value="{{ $floor->id }}" {{ $single_data->floor_id == $floor->id ? 'selected' : '' }}>{{ $floor->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="line_id">Select Line Name</label>
                                <select class="form-control" name="line_id" id="line_id">
                                    <option selected>Select Line</option>
                                    @foreach($lines as $line)
                                        <option value="{{ $line->id }}" {{ $single_data->line_id == $line->id ? 'selected' : '' }}>{{ $line->name
                                        ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Defect Code
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{$single_data->name}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
                    </div>
                </form>

            </div>
        </div>
@endsection
@push('script')
    <script type="text/javascript">
        $('#floor_id').on('change', function () {
            var idFloor = this.value;
            $("#line_id").html('');
            $.ajax({
                url: "{{route('fetchFloor')}}",
                type: "POST",
                data: {
                    floor_id: idFloor,
                    _token: '{{csrf_token()}}'
                },

                success: function (result) {
                    $('#line_id').html('<option value="">Select Line</option>');

                    $.each(result, function (key, value) {
                        $("#line_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });


        });
    </script>
@endpush
