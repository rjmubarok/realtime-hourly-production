@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info" style="">
            <form action="{{ route('op_p_skill_metrix_submit') }}" method="post">
                @csrf
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">Operator Skill Matrix Create</h3>
                        </div>
                        <div class="col-md-6 text-right">

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
                                <label for="operator_id">Select Operator </label>
                                <select class="form-control customSelect2" name="operator_id" id="operator_id">
                                    <option selected>Select Operator </option>
                                    @foreach ($operators as $operator)
                                    <option value="{{ $operator->id }}" {{ old('operator_id') }}>{{ $operator->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="designation_id">Select Designation </label>
                                <select class="form-control customSelect2" name="designation_id" id="designation_id">
                                    <option selected>Select Designation </option>
                                    @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}" {{ old('designation_id') }}>{{ $designation->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Join Date  </label>
                                <input type="date"  class="form-control" name="join_date"
                                    placeholder="Join Date">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Salary </label>
                                <input type="number" min="1" max="50000"  class="form-control" name="salary"
                                    placeholder="Salary">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Proposed Grade</label>
                                <input type="text"   class="form-control" name="propose_salary"
                                    placeholder="Proposed Grade">
                            </div>
                        </div>

                        <div class="col-sm-12 "  >
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color:#ece4da;">Machine</th>
                                        <th>Front Face JNT</th>
                                        <th>Sleeve join</th>
                                        <th>In seam join</th>
                                        <th>Side seam join</th>
                                        <th>Pocket bag close</th>
                                        <th>Hood Pannel join</th>
                                        <th>Performance</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="background-color:yellow;">Over Lock</th>
                                        <td><input value="Front Face JNT" name="ol[]" type="checkbox"></td>
                                        <td><input value="Sleeve join" name="ol[]" type="checkbox"></td>
                                        <td><input value="In seam join" name="ol[]" type="checkbox"></td>
                                        <td><input value="Pocket bag close" name="ol[]" type="checkbox"></td>
                                        <td><input value="Hood Pannel join" name="ol[]" type="checkbox"></td>
                                        <td><input value="Performance" name="ol[]" type="checkbox"></td>
                                        <td><input name="ol_performance"  type="number" min="1" max="100"></td>
                                    </tr>

                                </tbody>
                                <thead>
                                     <tr>
                                        <th style="background-color:yellow;">Single Needle lock stitch</th>
                                        <th>Hood make</th>
                                        <th>Hood Rolling</th>
                                        <th>ARMHOLE TS</th>
                                        <th>VELKRU JNT</th>
                                        <th>FAC JNT</th>
                                        <th>LABEL JNT</th>
                                        <th>CUFF ROLLING</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="Hood make"  name="snls[]" type="checkbox"></td>
                                        <td><input value="Hood  Rolling" name="snls[]" type="checkbox"></td>
                                        <td><input value="ARMHOLE TS" name="snls[]" type="checkbox"></td>
                                        <td><input value="VELKRU JNT" name="snls[]" type="checkbox"></td>
                                        <td><input value="FAC JNT" name="snls[]" type="checkbox"></td>
                                        <td><input value="LABEL JNT" name="snls[]" type="checkbox"></td>
                                        <td><input value="CUFF ROLLING" name="snls[]" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>BELT JNT</th>
                                        <th>MOUTH CLOSE</th>
                                        <th>PLAKET MAKE</th>
                                        <th>Coller Make</th>
                                        <th>BON JNT</th>
                                        <th>Bon top st</th>
                                        <th>Pocket join</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="BELT JNT" name="snls[]" type="checkbox"></td>
                                        <td><input value="MOUTH CLOSE" name="snls[]" type="checkbox"></td>
                                        <td><input value="PLAKET MAKE" name="snls[]" type="checkbox"></td>
                                        <td><input value="Coller Make" name="snls[]" type="checkbox"></td>
                                        <td><input value="BON JNT" name="snls[]" type="checkbox"></td>
                                        <td><input value="Bon top st" name="snls[]" type="checkbox"></td>
                                        <td><input value="Pocket join" name="snls[]" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>Coller & Hood join</th>
                                        <th>Zipper join</th>
                                        <th>Zipper top st</th>
                                        <th>SIDE JNT</th>
                                        <th>Sleeve join</th>
                                        <th>Coller linning join</th>
                                        <th>Zipper linning join</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="Coller & Hood join" name="snls[]" type="checkbox"></td>
                                        <td><input value="Zipper join" name="snls[]" type="checkbox"></td>
                                        <td><input value="Zipper top st" name="snls[]" type="checkbox"></td>
                                        <td><input value="SIDE JNT" name="snls[]" type="checkbox"></td>
                                        <td><input value="Sleeve join" name="snls[]" type="checkbox"></td>
                                        <td><input value="Coller linning join" name="snls[]" type="checkbox"></td>
                                        <td><input value="Zipper linning join" name="snls[]" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>Bottom linning join</th>
                                        <th>Cuff Linning join</th>
                                        <th>Cuff top st</th>
                                        <th>Bottom hem</th>
                                        <th>Placket join & top st</th>
                                        <th>Any top sttitch</th>
                                        <th>performance</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="Bottom linning join" name="snls[]" type="checkbox"></td>
                                        <td><input value="Cuff Linning join" name="snls[]" type="checkbox"></td>
                                        <td><input value="Cuff top st" name="snls[]" type="checkbox"></td>
                                        <td><input value="Bottom hem" name="snls[]" type="checkbox"></td>
                                        <td><input value="Placket join & top st" name="snls[]" type="checkbox"></td>
                                        <td><input value="Any top sttitch" name="snls[]" type="checkbox"></td>
                                        <td><input  name="snls_performance" type="number" min="1" max="100"></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Vertical</th>
                                        <th>BTTM & CUFF RIB MAKE</th>
                                        <th>Sleeve joint</th>
                                        <th>Side seam</th>
                                        <th>any padding basting</th>
                                        <th>Placket/hood Make</th>
                                        <th></th>
                                        <th>performance</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="BTTM & CUFF RIB MAKE" name="vertical[]" type="checkbox"></td>
                                        <td><input value="Sleeve joint" name="vertical[]" type="checkbox"></td>
                                        <td><input value="Side seam" name="vertical[]" type="checkbox"></td>
                                        <td><input value="any padding basting" name="vertical[]" type="checkbox"></td>
                                        <td><input value="Placket/hood Make" name="vertical[]" type="checkbox"></td>
                                        <td></td>
                                        <td><input name="vertical_performance" type="number" min="1" max="100"></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Double Needle Lock STS</th>
                                        <th>CUFF TS</th>
                                        <th>Bon join</th>
                                        <th>Pocket join(Angular)</th>
                                        <th>Armhole top st</th>
                                        <th>Flap TS</th>
                                        <th>aNY ts</th>
                                        <th>performance</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="CUFF TS"  name="dnls[]" type="checkbox"></td>
                                        <td><input value="Bon join" name="dnls[]" type="checkbox"></td>
                                        <td><input value="Pocket join" name="dnls[]" type="checkbox"></td>
                                        <td><input value="Armhole top st" name="dnls[]" type="checkbox"></td>
                                        <td><input value="Flap TS" name="dnls[]" type="checkbox"></td>
                                        <td><input value="aNY ts" name="dnls[]" type="checkbox"></td>
                                        <td><input name="dnls_performance" min="1" max="100" type="number"></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Kansai</th>
                                        <th>Wb top st</th>
                                        <th>west belt join by folder</th>


                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="Wb top st" type="checkbox" name="kansai[]"></td>
                                        <td><input value="west belt join by folder" type="checkbox" name="kansai[]"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">FOA</th>
                                        <th>any top st</th>
                                        <th>side join by folder</th>


                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="any top st" type="checkbox" name="foa[]"></td>
                                        <td><input value="side join by folder" type="checkbox" name="foa[]"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Snap</th>
                                        <th>Any punch/attach</th>



                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="Any punch/attach" type="checkbox" name="snap[]"></td>


                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">B/H</th>
                                        <th>plain hole</th>
                                        <th>eyelet hole</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="plain hole" type="checkbox" name="bh[]"></td>
                                        <td><input value="eyelet hole" type="checkbox" name="bh[]"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">BT</th>
                                        <th>any Bar take</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="any Bar take" type="checkbox" name="bt[]"></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">C/S</th>
                                        <th>Any Chine sttitch</th>
                                        <th>back yoke join by folder</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input value="Any Chine sttitch" type="checkbox" name="cs[]"></td>
                                        <td><input value="back yoke join by folder" type="checkbox" name="cs[]"></td>
                                    </tr>
                                    <tr>
                                        <th>Performance</th>
                                        <th><input type="number" min="1" max="100" value="" name="performance"></th>

                                    </tr>

                                </tbody>
                            </table>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Main process  </label>
                                <input type="text"  class="form-control" name="main_process"
                                    placeholder="Main process">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Present Work  </label>
                                <input type="text"  class="form-control" name="present_work"
                                    placeholder="Present Work">
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
                        $("#operator_id").html('');
                        $.ajax({
                                url: "{{ route('fetchOperatorByLine') }}",
                                type: "POST",
                                data: {
                                        line_id: line_ids,
                                        _token: '{{ csrf_token() }}'
                                },

                                success: function(result) {
                                        // console.log(result);
                                        $('#operator_id').html('<option value="">Select Operator</option>');
                                        $.each(result, function(key, value) {
                                                $("#operator_id").append('<option value="' + value
                                                        .id + '">' + value.name + '</option>');
                                        });
                                }
                        });
                });
        });
</script>


@endpush
