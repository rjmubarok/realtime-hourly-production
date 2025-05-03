@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info" style="">
            <form action="{{ route('npt_store') }}" method="post">
                @csrf
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">NPT Create</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('npt_list')}}" class="btn btn-primary"> NPT List </a>
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
                                    @foreach($floors as $floor)
                                    <option value="{{$floor->id}}" {{ old('floor_id') }}>{{$floor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="line_id">Select Line </label>
                                <select class="form-control customSelect2" name="line_id" id="line_id">
                                    <option selected>Select Line</option>
                                    @foreach($lines as $line)
                                    <option value="{{$line->id}}" {{ old('line_id') }}>{{$line->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="buyer_id">Select Buyer </label>
                                <select class="form-control customSelect2" name="buyer_id" id="buyer_id">
                                    <option selected>Select Buyer </option>
                                    @foreach($buyers as $buyer)
                                    <option value="{{$buyer->id}}" {{ old('buyer_id') }}>{{$buyer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="style">Style </label>
                                <input type="text" value="{{ old('style') }}" class="form-control" name="style"
                                    placeholder="Style">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="po">PO </label>
                                <input type="text" class="form-control" name="po" value="{{ old('po') }}"
                                    placeholder="PO">
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Status">NPT</label>
                                <select name="npt" class="form-control" required>
                                    <option value="ACCESSORIES DELAY">ACCESSORIES DELAY</option>
                                    <option value="ADJUSTMENT P/B">ADJUSTMENT P/B</option>
                                    <option value="APPROVE DELAY">APPROVE DELAY</option>
                                    <option value="BUYER ISSUE">BUYER ISSUE</option>
                                    <option value="C.PKT SHADING">C.PKT SHADING</option>
                                    <option value="CUTTING DELAY">CUTTING DELAY</option>
                                    <option value="CUTTING MISTAKE">CUTTING MISTAKE</option>
                                    <option value="ELECTRIC PROBLEM">ELECTRIC PROBLEM</option>
                                    <option value="ELECTRICAL DELAY">ELECTRICAL DELAY</option>
                                    <option value="EMBROIDERING DELAY">EMBROIDERING DELAY</option>
                                    <option value="FABRIC DELAY">FABRIC DELAY</option>
                                    <option value="FACTORY FIRE DELAY">FACTORY FIRE DELAY</option>
                                    <option value="INITIAL PROBLEM">INITIAL PROBLEM</option>
                                    <option value="LAYOUT DELAY">LAYOUT DELAY</option>
                                    <option value="MACHINE BREAKDOWN">MACHINE BREAKDOWN</option>
                                    <option value="MACHINE DELAY">MACHINE DELAY</option>
                                    <option value="MEETING">MEETING</option>
                                    <option value="NEEDLE BREAK">NEEDLE BREAK</option>
                                    <option value="OP. NOT AVAILABLE">OP. NOT AVAILABLE</option>
                                    <option value="OP. DELAY">OP. DELAY</option>
                                    <option value="PATTERN NOT READY">PATTERN NOT READY</option>
                                    <option value="PATTERN SUPPLY N/A">PATTERN SUPPLY N/A</option>
                                    <option value="POWER FAILURE">POWER FAILURE</option>
                                    <option value="PRAYER">PRAYER</option>
                                    <option value="PRINT PART NOT AVAILABLE">PRINT PART NOT AVAILABLE</option>
                                    <option value="PRINTING DELAY">PRINTING DELAY</option>
                                    <option value="PRINTING MISTAKE">PRINTING MISTAKE</option>
                                    <option value="PRODUCTION MEETING">PRODUCTION MEETING</option>
                                    <option value="QUALITY PROBLEM">QUALITY PROBLEM</option>
                                    <option value="QUILTING SUPPLY NA">QUILTING SUPPLY NA</option>
                                    <option value="RE FEEDING">RE FEEDING</option>
                                    <option value="RE LINE FEEDING">RE LINE FEEDING</option>
                                    <option value="RE WORK">RE WORK</option>
                                    <option value="SEWING SECTION DELAY">SEWING SECTION DELAY</option>
                                    <option value="SHADE PROBLEM">SHADE PROBLEM</option>
                                    <option value="SKIP">SKIP</option>
                                    <option value="SNAP MOOL N/A">SNAP MOOL N/A</option>
                                    <option value="STREAM PROBLEM">STREAM PROBLEM</option>
                                    <option value="STYLE CHANGING DELAY">STYLE CHANGING DELAY</option>
                                    <option value="STYLE CHANGING TIME">STYLE CHANGING TIME</option>
                                    <option value="STYLING MISTAKE">STYLING MISTAKE</option>
                                    <option value="TAMPLET SEWING UNIT">TAMPLET SEWING UNIT</option>
                                    <option value="TECHNICAL ISSUE">TECHNICAL ISSUE</option>
                                    <option value="THREAD CUT">THREAD CUT</option>
                                    <option value="THREAD MISTAKE">THREAD MISTAKE</option>
                                    <option value="TRANSPORTATION DELAY">TRANSPORTATION DELAY</option>
                                    <option value="WAITING FOR WORK">WAITING FOR WORK</option>
                                    <option value="WORK STOP">WORK STOP</option>
                                    <option value="ZIPPER CLOSE">ZIPPER CLOSE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="po">Lost Minuites</label>
                                <input type="number" class="form-control" name="lost_minuite" placeholder="Minuites"
                                    value="{{old('lost_minuite')}}" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="po">Reason</label>
                                <input type="text" class="form-control" name="reason" placeholder="Reason"
                                    value="{{old('reason')}}" required>
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
                        // $('#line_id').html('<option value="">Select Line</option>');
                        $('select[name="line_id"]');

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
                  //  console.log(line_ids)
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
