@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info" style="">
            <form action="{{ route('opp_report_view') }}" method="post" target="_blank">
                @csrf
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">Operator Performances Report</h3>
                        </div>

                    </div>
                </div>
                <div class="card-body">
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="buyer_id">Select Buyer </label>
                                <select class="form-control customSelect2" name="buyer_id" id="buyer_id">
                                    <option selected>Select Buyer </option>
                                    @foreach ($buyers as $buyer)
                                    <option value="{{ $buyer->id }}" {{ old('buyer_id') }}>{{ $buyer->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="buyer_id">Style </label>
                                <input type="text" name="style" class="form-control" placeholder="style">
                            </div>
                        </div>



                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-success w-100">save</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
                $('#floor_id').on('change', function() {
                        var idFloor = this.value;
                        $("#line_id").html('');
                        $.ajax({
                                url: "{{ route('fetcLineByFloor') }}",
                                type: "POST",
                                data: {
                                        floor_id: idFloor,
                                        _token: '{{ csrf_token() }}'
                                },

                                success: function(result) {
                                        $('#line_id').html('<option value="">Select Line</option>');

                                        $.each(result, function(key, value) {
                                                $("#line_id").append('<option value="' + value
                                                        .id + '">' + value.name + '</option>');
                                        });
                                }
                        });
                });
        });
</script>
<script>
    $(document).ready(function() {

                $('#line_id').on('change', function() {
                        var line_ids = this.value;
                        console.log(line_ids)
                        $("#buyer_id").html('');
                        $.ajax({
                                url: "{{ route('fetchBuyerByLine') }}",
                                type: "POST",
                                data: {
                                        line_id: line_ids,
                                        _token: '{{ csrf_token() }}'
                                },

                                success: function(result) {
                                        // console.log(result);
                                        $('#buyer_id').html('<option value="">Select Buyer</option>');
                                        $.each(result, function(key, value) {
                                                $("#buyer_id").append('<option value="' + value
                                                        .id + '">' + value.name + '</option>');
                                        });
                                }
                        });
                });
        });
</script>


@endpush
