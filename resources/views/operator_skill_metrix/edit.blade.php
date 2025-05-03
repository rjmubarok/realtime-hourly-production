@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info" style="">
            <form action="{{ route('op_p_skill_metrix_update',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">Operator Skill Matrix Edit</h3>
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
                                    <option value="{{ $floor->id }}" {{ $data->floor_id == $floor->id ? 'selected' : '' }}>{{ $floor->name }}
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
                                    <option value="{{ $line->id }}" {{ $data->line_id == $line->id ? 'selected' : '' }}>{{ $line->name }}
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
                                    <option value="{{ $operator->id }}" {{ $data->operator_id == $operator->id ? 'selected' : '' }}>{{ $operator->name }}
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
                                    <option value="{{ $designation->id }}" {{ $data->designation_id == $designation->id ? 'selected' : '' }}>{{ $designation->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Join Date  </label>
                                <input type="date"  class="form-control" value="{{$data->join_date}}" name="join_date"
                                   >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Salary </label>
                                <input type="number" min="1" max="50000"  class="form-control" name="salary"
                                    placeholder="Salary" value="{{$data->salary}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Proposed Grade </label>
                                <input type="text"   class="form-control" name="propose_salary"
                                    placeholder="Proposed Grade" value="{{$data->propose_salary}}">
                            </div>
                        </div>

                        <div class="col-sm-12 "  >
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color:#ece4da;">Machine</th>
                                        <th style="width:100px">Front Face JNT</th>
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
                                        <td><input {{ in_array('Front Face JNT', $ol) ? 'checked' : '' }} value="Front Face JNT" name="ol[]" type="checkbox"></td>
                                        <td><input {{ in_array('Sleeve join', $ol) ? 'checked' : '' }} value="Sleeve join" name="ol[]" type="checkbox"></td>
                                        <td><input {{ in_array('In seam join', $ol) ? 'checked' : '' }} value="In seam join" name="ol[]" type="checkbox"></td>
                                        <td><input {{ in_array('Side seam join', $ol) ? 'checked' : '' }} value="Side seam join" name="ol[]" type="checkbox"></td>
                                        <td><input {{ in_array('Pocket bag close', $ol) ? 'checked' : '' }} value="Pocket bag close" name="ol[]" type="checkbox"></td>
                                        <td><input {{ in_array('Hood Pannel join', $ol) ? 'checked' : '' }} value="Hood Pannel join" name="ol[]" type="checkbox"></td>

                                        <td><input  value="{{$data->ol_performance}}" name="ol_performance" type="number" min="1" max="100"></td>
                                    </tr>

                                </tbody>
                                <thead>
                                     <tr>
                                        <th style="background-color:yellow;">Single Needle lock stitch</th>
                                        <th>Hood make</th>
                                        <th>Hood  Rolling</th>
                                        <th>ARMHOLE TS</th>
                                        <th>VELKRU JNT</th>
                                        <th>FAC JNT</th>
                                        <th>LABEL JNT</th>
                                        <th>CUFF ROLLING</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('Hood make', $snls) ? 'checked' : '' }} value="Hood make"  name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Hood  Rolling', $snls) ? 'checked' : '' }} value="Hood  Rolling" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('ARMHOLE TS', $snls) ? 'checked' : '' }} value="ARMHOLE TS" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('VELKRU JNT', $snls) ? 'checked' : '' }} value="VELKRU JNT" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('FAC JNT', $snls) ? 'checked' : '' }} value="FAC JNT" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('LABEL JNT', $snls) ? 'checked' : '' }} value="LABEL JNT" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('CUFF ROLLING', $snls) ? 'checked' : '' }} value="CUFF ROLLING" name="snls[]" type="checkbox"></td>
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
                                        <td><input {{ in_array('BELT JNT', $ol) ? 'checked' : '' }} value="BELT JNT" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('MOUTH CLOSE', $ol) ? 'checked' : '' }} value="MOUTH CLOSE" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('PLAKET MAKE', $ol) ? 'checked' : '' }} value="PLAKET MAKE" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Coller Make', $ol) ? 'checked' : '' }} value="Coller Make" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('BON JNT', $ol) ? 'checked' : '' }} value="BON JNT" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Bon top st', $ol) ? 'checked' : '' }} value="Bon top st" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Pocket join', $ol) ? 'checked' : '' }} value="Pocket join" name="snls[]" type="checkbox"></td>
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
                                        <td><input {{ in_array('Coller & Hood join', $snls) ? 'checked' : '' }} value="Coller & Hood join" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Zipper join', $snls) ? 'checked' : '' }} value="Zipper join" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Zipper top st', $snls) ? 'checked' : '' }} value="Zipper top st" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('SIDE JNT', $snls) ? 'checked' : '' }} value="SIDE JNT" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Sleeve join', $snls) ? 'checked' : '' }} value="Sleeve join" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Coller linning join', $snls) ? 'checked' : '' }} value="Coller linning join" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Zipper linning join', $snls) ? 'checked' : '' }} value="Zipper linning join" name="snls[]" type="checkbox"></td>
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
                                        <td><input {{ in_array('Bottom linning join', $snls) ? 'checked' : '' }} value="Bottom linning join" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Cuff Linning join', $snls) ? 'checked' : '' }} value="Cuff Linning join" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Cuff top st', $snls) ? 'checked' : '' }} value="Cuff top st" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Bottom hem', $snls) ? 'checked' : '' }} value="Bottom hem" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Placket join & top st', $snls) ? 'checked' : '' }} value="Placket join & top st" name="snls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Any top sttitch', $snls) ? 'checked' : '' }} value="Any top sttitch" name="snls[]" type="checkbox"></td>
                                        <td><input value="{{$data->snls_performance}}" name="snls_performance" type="number" min="1" max="100"></td>
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
                                        <td><input {{ in_array('BTTM & CUFF RIB MAKE', $vertical) ? 'checked' : '' }} value="BTTM & CUFF RIB MAKE" name="vertical[]" type="checkbox"></td>
                                        <td><input {{ in_array('Sleeve joint', $vertical) ? 'checked' : '' }} value="Sleeve joint" name="vertical[]" type="checkbox"></td>
                                        <td><input {{ in_array('Side seam', $vertical) ? 'checked' : '' }} value="Side seam" name="vertical[]" type="checkbox"></td>
                                        <td><input {{ in_array('any padding basting', $vertical) ? 'checked' : '' }} value="any padding basting" name="vertical[]" type="checkbox"></td>
                                        <td><input {{ in_array('Placket/hood Make', $vertical) ? 'checked' : '' }} value="Placket/hood Make" name="vertical[]" type="checkbox"></td>
                                        <td></td>
                                        <td><input value="{{$data->vertical_performance}}" name="vertical_performance" min="1" max="100" type="number"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Double Needle Lock STS</th>
                                        <th>CUFF TS</th>
                                        <th>Bon join</th>
                                        <th>Pocket join(Angular)</th>
                                        <th>Armhole top st</th>
                                        <th>Flap TS</th>
                                        <th>Any ts</th>
                                        <th>performance</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('CUFF TS', $dnls) ? 'checked' : '' }} value="CUFF TS"   name="dnls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Bon join', $dnls) ? 'checked' : '' }} value="Bon join" name="dnls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Pocket join', $dnls) ? 'checked' : '' }} value="Pocket join" name="dnls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Armhole top st', $dnls) ? 'checked' : '' }} value="Armhole top st" name="dnls[]" type="checkbox"></td>
                                        <td><input {{ in_array('Flap TS', $dnls) ? 'checked' : '' }} value="Flap TS" name="dnls[]" type="checkbox"></td>
                                        <td><input {{ in_array('aNY ts', $dnls) ? 'checked' : '' }} value="aNY ts" name="dnls[]" type="checkbox"></td>
                                        <td><input value="{{$data->dnls_performance}}" name="dnls_performance" type="number" min="1" max="100"></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Kansai</th>
                                        <th>Wb top st</th>
                                        <th>west belt join by folder</th>


                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('Wb top st', $kansai ) ? 'checked' : '' }} value="Wb top st" type="checkbox" name="kansai[]"></td>
                                        <td><input {{ in_array('west belt join by folder', $kansai ) ? 'checked' : '' }} value="west belt join by folder" type="checkbox" name="kansai[]"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">FOA</th>
                                        <th>any top st</th>
                                        <th>side join by folder</th>


                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('any top st', $foa) ? 'checked' : '' }} value="any top st" type="checkbox" name="foa[]"></td>
                                        <td><input {{ in_array('side join by folder', $foa) ? 'checked' : '' }} value="side join by folder" type="checkbox" name="foa[]"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">Snap</th>
                                        <th>Any punch/attach</th>



                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('Any punch/attach', $snap) ? 'checked' : '' }} value="Any punch/attach" type="checkbox" name="snap[]"></td>


                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">B/H</th>
                                        <th>plain hole</th>
                                        <th>eyelet hole</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('plain hole', $bh) ? 'checked' : '' }} value="plain hole" type="checkbox" name="bh[]"></td>
                                        <td><input {{ in_array('eyelet hole', $bh) ? 'checked' : '' }} value="eyelet hole" type="checkbox" name="bh[]"></td>

                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">BT</th>
                                        <th>any Bar take</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('any Bar take', $bt) ? 'checked' : '' }} value="any Bar take" type="checkbox"  name="bt[]"></td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:yellow;">C/S</th>
                                        <th>Any Chine sttitch</th>
                                        <th>back yoke join by folder</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input {{ in_array('Any Chine sttitch', $cs) ? 'checked' : '' }} value="Any Chine sttitch" type="checkbox" name="cs[]"></td>
                                        <td><input {{ in_array('back yoke join by folder', $cs) ? 'checked' : '' }} value="back yoke join by folder" type="checkbox" name="cs[]"></td>
                                    </tr>
                                    <tr>
                                        <th>Performance</th>
                                        <th><input type="number" name="performance" value="{{$data->performance}}" min="1" max="100"></th>

                                    </tr>

                                </tbody>
                            </table>

                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Main process  </label>
                                <input type="text"  value=" {{$data->main_process}} " class="form-control" name="main_process"
                                    placeholder="Main process">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Present Work  </label>
                                <input type="text"  value="{{$data->present_work}}" class="form-control" name="present_work"
                                    placeholder="Present Work">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
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
