@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('productFormSubmit') }}" name="menuManagerForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header bg-cyan">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title text-bold mt-2">Line Output</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body align-content-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Output
                                        <span class="text-danger">*</span>
                                    </label>
                                    <p>Please select your Output:</p>
                                    <input type="radio" onclick="javascript:yesnoCheck();" id="qc_passed" name="output" value="1">

                                    <label for="qc_passed" id="qc_passed"> QC Passed</label><br><br>
                                    <input type="radio" onclick="javascript:yesnoCheck();" id="rectified" name="output" value="2">
                                    <label for="rectified" id="rectified"> Rectified</label><br><br>
                                    <input type="radio" onclick="javascript:yesnoCheck();" id="reject" name="output" value="3">
                                    <label for="reject" id="reject"> Reject</label><br><br>
                                    <input type="radio" onclick="javascript:yesnoCheck();" id="defected" name="output" value="4">
                                    <label for="defected" id="defected">Defected</label>

                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <input class="form-checkbox mr-2" type="checkbox" id="multipleCheckYes" onclick="javascript:multipleCheck();"><label for="style_id">Multiple Qc Passed ?</label>

                                    </div>

                                </div>
                                <div class="col-sm-6 " style="display: none" id="multipleCheckShow">
                                    <div class="form-group">
                                        <label for="style_id"> Qc Pass Quantity:</label>
                                        <input type="number" name="qc_pass_quantity" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Size
                                        <span class="text-danger">*</span>
                                    </label>
                                    <p>Please select your Size:</p>
                                    @forelse ($sizes as $size)
                                    <input type="radio" id="qc_passed" name="size" value="{{$size->name}}" required>
                                    <label for="size_1">{{$size->name}} &nbsp;</label>
                                    @empty
                                    Size not found
                                    @endforelse
                                    {{-- <!-- <input type="radio" id="qc_passed" name="size" value="128" required>
                                    <label for="size_1">128&nbsp;&nbsp;</label>
                                    <input type="radio" id="qc_passed" name="size" value="134">
                                    <label for="size_2">134&nbsp;</label>
                                    <input type="radio" id="rectified" name="size" value="140">
                                    <label for="size_3">140&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="146">
                                    <label for="size_4">146&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="152">
                                    <label for="size_5">152&nbsp;</label><br>
                                    <input type="radio" id="qc_passed" name="size" value="158">
                                    <label for="size_6">158&nbsp;</label>
                                    <input type="radio" id="qc_passed" name="size" value="164">
                                    <label for="size_7">164&nbsp;</label>
                                    <input type="radio" id="rectified" name="size" value="170">
                                    <label for="size_8">170&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="176">
                                    <label for="size_9">176&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="182">
                                    <label for="size_10">182&nbsp;</label> -->
                                    <input type="radio" id="qc_passed" name="size" value="8" required>
                                    <label for="size_1">8&nbsp;&nbsp;</label>
                                    <input type="radio" id="qc_passed" name="size" value="10">
                                    <label for="size_2">10&nbsp;</label>
                                    <input type="radio" id="rectified" name="size" value="12">
                                    <label for="size_3">12&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="14">
                                    <label for="size_4">14&nbsp;</label><br>
                                    <input type="radio" id="qc_passed" name="size" value="XXS">
                                    <label for="size_11">XXS&nbsp;</label>
                                    <input type="radio" id="qc_passed" name="size" value="XS">
                                    <label for="size_12">XS&nbsp;</label>
                                    <input type="radio" id="rectified" name="size" value="S">
                                    <label for="size_13">S&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="M">
                                    <label for="size_14">M&nbsp;</label>
                                    <input type="radio" id="reject" name="size" value="L">
                                    <label for="size_15">L&nbsp;</label><br>
                                    <input type="radio" id="qc_passed" name="size" value="XL">
                                    <label for="size_16">XL&nbsp;</label>
                                    <input type="radio" id="qc_passed" name="size" value="XXL">
                                    <label for="size_17">XXL&nbsp;</label>
                                    <input type="radio" id="rectified" name="size" value="XXXL">
                                    <label for="size_18">XXXL&nbsp;</label> --}}

                                    <input type="radio" onchange="checkvalueOtherSize(this.value)" id="other" value="OTHERS" name="size">
                                    <label for="Other">Other</label>
                                    <input type="text" id="text_field" name="other_size" placeholder="Size" class="form-control" style="display: none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="color">Color</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="color" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="po">PO</label>
                                <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="po" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="buyer_id">Choose a Buyer:</label>
                                <select id="buyer_id" name="buyer_id" class="form-control" required>
                                    @foreach($buyers as $buyer)
                                        <option value={{$buyer->id}}>{{$buyer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="style">Style:</label>
                                <input id="style" type="text" class="form-control" name="style" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12" id="ifYes" style="display: none">
                        <div class="form-group">
                            <!-- <label for="po">Operator Name: {{\Illuminate\Support\Facades\Auth::user()->name}}</label> -->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="process">Process:</label>
                                    <select name="process" id="process" class="form-control select2Custom" onchange="checkvalueProcess(this.value)"
                                            style="width: 100%;">
                                        <option value="">Please Select</option>
                                        @foreach($process_data as $process)
                                            <option value="{{$process->name}}">{{$process->name}}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control" type="text" name="process_text" id="process_text" style='display:none'/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mc">MC:</label>
                                    <select name="mc" id="mc" class="form-control select2Custom" onchange="checkvalue(this.value)" style="width: 100%;">
                                        <option value="">Please Select</option>
                                        @foreach($mc_data as $mc)
                                            <option value="{{$mc->name}}">{{$mc->name}}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control" type="text" name="mc_text" id="mc_text" style='display:none'/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="defect_code">Defect Code :</label>
                                    <select name="defect_code" id="defect_code" class="form-control select2Custom" onchange="checkvalueDefectCode(this
                                    .value)"
                                            style="width: 100%;">
                                        <option value="">Please Select</option>
                                        @foreach($defect_data as $defect)
                                            <option value="{{$defect->name}}">{{$defect->name}}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control" type="text" name="defect_code_text" id="defect_code_text" style='display:none'/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="op_name">Operator Name:</label>
                                    <select name="op_name" id="op_name" class="form-control select2Custom" onchange="checkvalueOpname(this.value)"
                                            style="width: 100%;">
                                        <option value="">Please Select</option>
                                        @foreach($operators  as $operator)
                                            <option value="{{$operator->name}}">{{$operator->name}}</option>
                                        @endforeach
                                        <option value="OTHERS">Others/Replace</option>
                                    </select>
                                    <input class="form-control" type="text" name="op_name_text" id="op_name_text" style='display:none'/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ten_cards">Ten Card:</label>
                                    <select name="ten_cards" id="ten_cards" class="form-control select2Custom" onchange="checkvalueTenCards(this.value)" style="width: 100%;">
                                        <option value="">Please Select</option>
                                        @foreach($card_data as $card)
                                            <option value="{{$card->name}}">{{$card->name}}</option>
                                        @endforeach

                                        <option value="OTHERS">Others</option>
                                    </select>
                                    <input class="form-control" type="text" name="ten_cards_text" id="ten_cards_text" style='display:none'/>

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="defect_quantity">Defect Quantity:</label>
                                    <input id="defect_quantity" type="number" min="0" class="form-control" name="defect_quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-success w-100">Submit</button>
                    </div>
                </form>

            </div>
        </div>
        @endsection
        @push('script')
            <script type="text/javascript">
                function yesnoCheck() {
                    if (document.getElementById('defected').checked) {
                        document.getElementById('ifYes').style.display = 'block';
                        document.getElementById('process').required = true;
                        document.getElementById('mc').required = true;
                        document.getElementById('defect_quantity').required = true;
                        document.getElementById('defect_code').required = true;
                        document.getElementById('op_name').required = true;
                        document.getElementById('ten_cards').required = true;
                    } else {
                        document.getElementById('ifYes').style.display = 'none';
                        document.getElementById('process').required = false;
                        document.getElementById('mc').required = false;
                        document.getElementById('defect_code').required = false;
                        document.getElementById('defect_quantity').required = false;
                        document.getElementById('op_name').required = false;
                        document.getElementById('ten_cards').required = false;
                    }
                }

                function checkvalue(val) {
                    if (val === "OTHERS")
                        document.getElementById('mc_text').style.display = 'block';
                    else
                        document.getElementById('mc_text').style.display = 'none';
                }

                function checkvalueProcess(val) {
                    if (val === "OTHERS")
                        document.getElementById('process_text').style.display = 'block';
                    else
                        document.getElementById('process_text').style.display = 'none';
                }

                function checkvalueOpname(val) {
                    if (val === "OTHERS")
                        document.getElementById('op_name_text').style.display = 'block';
                    else
                        document.getElementById('op_name_text').style.display = 'none';
                }

                function checkvalueDefectCode(val) {
                    if (val === "OTHERS")
                        document.getElementById('defect_code_text').style.display = 'block';

                    else
                        document.getElementById('defect_code_text').style.display = 'none';
                }
                function checkvalueTenCards(val) {
                    if (val === "OTHERS")
                        document.getElementById('ten_cards').style.display = 'block';
                    else
                        document.getElementById('ten_cards').style.display = 'none';
                }

                $('#submit_button').click(function (e) {
                    e.preventDefault();
                    var newValue = $('mc_text').val(); // Modify me
                    $('.mc').val(newValue);
                    $('mc').submit();
                });

                $('.select2Custom').select2({
                    placeholder: 'Select a Name',
                    allowClear: true
                });

                function checkvalueOtherSize(val) {
                    if (val === "OTHERS")
                        document.getElementById('text_field').style.display = 'block';
                    else
                        document.getElementById('text_field').style.display = 'none';
                }
                function multipleCheck() {
        if (document.getElementById('multipleCheckYes').checked) {
            document.getElementById('multipleCheckShow').style.display = 'block';

        } else {
            document.getElementById('multipleCheckShow').style.display = 'none';

        }
    }
            </script>

    @endpush
