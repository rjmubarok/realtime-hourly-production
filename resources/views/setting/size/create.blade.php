@extends('master')
@section('content')
<div class="row mt-4 m-4">
    <div class="col-sm-6 offset-3">
        <div class="card card-info" style="">
            <form action="{{ route('sizeSave') }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="floor_id">Select Floor Name</label>
                    <select class="form-control" name="floor_id" id="floor_id">
                        <option selected>Select Floor</option>
                        @foreach($floors as $floor)
                            <option value="{{$floor->id}}">{{$floor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="line_id">Select Line Name</label>
                    <select class="form-control" name="line_id" id="line_id">
                        <option selected>Select Line</option>
                        @foreach($lines as $line)
                            <option value="{{$line->id}}">{{$line->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="">Size Name</label>
                    <input type="text" name="name" placeholder="Enter Size Name"
                                class="form-control" />
                </div>
                <button type="submit" class="btn btn-success   mt-3 ml-3">Save</button>
            </form>

        </div>
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
