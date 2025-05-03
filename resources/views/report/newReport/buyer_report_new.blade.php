@extends('master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Search IE </h3>
        </div>
        <div class="card-body">
            <form action="{{ route('buyer_new_report_result') }}" method="post" target="_blank">
                @CSRF
                <div class="row">
                    <div class="col-sm-6">
                        <label for="floor_id">Select Floor Name</label>
                        <select class="form-control" name="floor_id" id="floor_id">
                            <option selected>Select Floor</option>
                            @foreach($floors as $floor)
                                <option value="{{$floor->id}}">{{$floor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="line_id">Select Line Name</label>
                        <select class="form-control" name="line_id" id="line_id">
                            <option selected>Select Line</option>
                            @foreach($lines as $line)
                                <option value="{{$line->id}}">{{$line->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                    <label for="buyer_id"> Select Buyer</label>
                        <select id="buyer_id" name="buyer_id" class="form-control" required>
                            @foreach($buyers as $buyer)
                                <option value={{$buyer->id}}>{{$buyer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="style">Style</label>
                        <input type="text" name="style" id="from" class="form-control" required/>
                    </div>
                    <div class="col-md-6">
                        <label for="from">From Date</label>
                        <input type="date" name="from" id="from" class="form-control" value="{{ date('Y-m-d') }}"
                               required/>
                    </div>
                    <div class="col-md-6">
                        <label for="to">To Date</label>
                        <input type="date" name="to" id="to" class="form-control" value="{{ date('Y-m-d') }}" required/>
                    </div>
                    <div class="col">
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
<script>
    $(document).ready(function () {

            $('#line_id').on('change', function () {
                var line_ids = this.value;
                    console.log(line_ids)
                $("#buyer_id").html('');
                $.ajax({
                    url: "{{route('fetchBuyerByLine')}}",
                    type: "POST",
                    data: {
                        line_id: line_ids,
                        _token: '{{csrf_token()}}'
                    },

                    success: function (result) {
                       // console.log(result);
                        $('#buyer_id').html('<option value="">Select Buyer</option>');
                        $.each(result, function (key, value) {
                            $("#buyer_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });

</script>
@endpush
