@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Search Operator Skill Matrix </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('operator_skill_metrix_report_view') }}" method="post" target="_blank">
                @CSRF
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="floor_id">Select Floor </label>
                            <select class="form-control" name="floor_id" id="floor_id">
                                <option selected>Select Floor</option>
                                @foreach ($floors as $floor)
                                <option value="{{ $floor->id }}" {{ old('floor_id') }}>{{ $floor->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="line_id">Select Line </label>
                            <select class="form-control customSelect2" name="line_id" id="line_id">
                                <option selected>Select Line</option>
                                @foreach ($lines as $line)
                                <option value="{{ $line->id }}" {{ old('line_id') }}>{{ $line->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-sm-4 mt-2">
                        <button type="submit" class="btn btn-success btn-sm mt-4">
                            <i class="fas fa-search"></i>search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
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
        });

</script>


@endpush
