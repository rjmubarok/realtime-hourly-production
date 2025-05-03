@extends('master')
@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card card-info" style="">
            <form action="{{ route('measurement_form_submit') }}" method="post">
                @csrf
                <div class="card-header bg-cyan">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title text-bold mt-2">Measurement Create</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('measurement') }}" class="btn btn-primary">
                                Measurement List </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="floor_id">Select Floor </label>
                                <select class="form-control" name="floor_id" id="floor_id" required>
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
                                <select class="form-control customSelect2" name="line_id" id="line_id" required>
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
                                <select class="form-control customSelect2" name="buyer_id" id="buyer_id" required>
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
                                <label for="style">Style </label>
                                <input type="text" class="form-control" name="style" placeholder="Style" {{ old('style')
                                    }} required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="po">PO </label>
                                <input type="text" {{ old('po') }} class="form-control" name="po" placeholder="PO" required>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group mt-4">
                                <label for="bw">BW</label>
                                <input type="radio" {{ old('aw_bw') }} name="aw_bw" value="BW">

                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group mt-4">
                                <label for="aw">AW</label>
                                <input type="radio" {{ old('aw_bw') }} name="aw_bw" value="AW">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group mt-4">
                                <label for="aw">NW</label>
                                <input type="radio" {{ old('aw_bw') }} name="aw_bw" value="NW">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Size
                                    <span class="text-danger">*</span>
                                </label>
                                <p>Please select your Size:</p>
                                @forelse ($sizes as $size)
                                    <input type="radio"  id="qc_passed" name="size" value="{{$size->name}}" required>
                                    <label for="size_1" >{{$size->name}} &nbsp;</label>
                                    @empty
                                    Size not found
                                    @endforelse
                                    
                                {{-- <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="128" required>
                                <label for="size_1">128</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="134">
                                <label for="size_2">134</label>
                                <input type="radio" id="rectified" {{ old('size') }} name="size" value="140">
                                <label for="size_3">140</label>
                                <input type="radio" id="reject" {{ old('size') }} name="size" value="146">
                                <label for="size_4">146</label>
                                <input type="radio" id="reject" {{ old('size') }} name="size" value="152">
                                <label for="size_5">152</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="158">
                                <label for="size_6">158</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="164">
                                <label for="size_7">164</label>
                                <input type="radio" id="rectified" {{ old('size') }} name="size" value="170">
                                <label for="size_8">170</label>
                                <input type="radio" id="reject" {{ old('size') }} name="size" value="176">
                                <label for="size_9">176</label>
                                <input type="radio" id="reject" {{ old('size') }} name="size" value="182">
                                <label for="size_10">182</label><br>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="XXS">

                                <label for="size_11">XXS</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="XS">
                                <label for="size_12">XS</label>
                                <input type="radio" id="rectified" {{ old('size') }} name="size" value="S">
                                <label for="size_13">S</label>
                                <input type="radio" id="reject" {{ old('size') }} name="size" value="M">
                                <label for="size_14">M</label>
                                <input type="radio" id="reject" {{ old('size') }} name="size" value="L">
                                <label for="size_15">L</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="XL">
                                <label for="size_16">XL</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="XXL">
                                <label for="size_17">XXL</label>
                                <input type="radio" id="rectified" {{ old('size') }} name="size" value="XXXL">
                                <label for="size_18">XXXL</label> --}}

                                <input type="radio" id="reject" {{ old('size') }} name="size" value="8">
                                <label for="size_15">8</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="10">
                                <label for="size_16">10</label>
                                <input type="radio" id="qc_passed" {{ old('size') }} name="size" value="12">
                                <label for="size_17">12</label>
                                <input type="radio" id="rectified" {{ old('size') }} name="size" value="14">
                                <label for="size_18">14</label>

                                <input type="radio" onchange="checkvalueOtherSize(this.value)" id="other" value="OTHERS"
                                    {{ old('size') }} name="size">
                                <label for="Other">Other</label>
                                <input type="text" id="text_field" {{ old('other_size') }} name="other_size"
                                    placeholder="Size" class="form-control" style="display: none">
                            </div>
                        </div>
                        <div class="col-sm-3" id="jackets">
                            <div class="form-group">
                                <label>jacket</label>
                                <input type="radio" onclick="javascript:yesnoCheck(this);" {{ old('jacket_pant') }}
                                    name="jacket_pant" value="Jacket" id="jacket_id">
                            </div>

                        </div>
                        <div class="col-sm-3" id="pants">
                            <div class="form-group">
                                <label>Pant</label>
                                <input name="jacket_pant" onclick="javascript:yesnoCheck();" {{ old('jacket_pant') }}
                                    type="radio" value="Pant" id="pant">
                            </div>
                        </div>
                        <div class="col-sm-3" id="inchdiv">
                            <div class="form-group">
                                <label>INCH</label>
                                <input type="radio" name="inch_cm" onclick="javascript:yesnoCheck_inch_cm(this);" {{
                                    old('inch_cm') }} id="inch">
                            </div>

                        </div>
                        <div class="col-sm-3" id="cmdiv">
                            <div class="form-group">
                                <label>CM</label>
                                <input name="inch_cm" onclick="javascript:yesnoCheck_inch_cm(this);" {{ old('inch_cm')
                                    }} type="radio" id="centimetter">
                            </div>
                        </div>
                        <div class="col-sm-12 " id="ifYes" style="display: none">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Key Points</th>
                                        <th class="inch">inch (+)1 1/4</th>
                                        <th class="inch">inch (+)1</th>
                                        <th class="inch">inch (+) 3/4</th>
                                        <th class="inch">inch (+)1/2</th>
                                        <th class="inch">inch (+)1/4</th>
                                        <th class="inch">inch 0</th>
                                        <th class="inch">inch -1/4</th>
                                        <th class="inch">inch -1/2</th>
                                        <th class="inch">inch -3/4</th>
                                        <th class="inch">inch -1</th>
                                        <th class="inch">inch -1 1/4</th>
                                        <th class="cm">cm(+)1.5</th>
                                        <th class="cm">cm (+)1</th>
                                        <th class="cm">cm(+)0.8</th>
                                        <th class="cm">cm(+)0.5</th>
                                        <th class="cm">cm(+)0.3</th>
                                        <th class="cm">cm(+)0</th>
                                        <th class="cm">cm -0.3</th>
                                        <th class="cm">cm -0.5</th>
                                        <th class="cm">cm -0.8</th>
                                        <th class="cm">cm -1</th>
                                        <th class="cm">cm -1.5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Chest</th>

                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch (+)1" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch 0" type="radio">
                                        </td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch -1/4" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch -1/2" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }} name="cheat[]" value="inch -3/4" type="radio"></td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="inch -1" type="radio">
                                        </td>
                                        <td class="inch"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="inch -1 1/4" type="radio"></td>


                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm(+)1.5" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm(+)1" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm(+)0.8" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm(+)0.5" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm(+)0.3" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm(+)0" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm -0.3" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm -0.5" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm -0.8" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm -1" type="radio">
                                        </td>
                                        <td class="cm"><input onclick="return validateForm(this);" {{ old('cheat[]')
                                                }}name="cheat[]" value="cm -1.5" type="radio">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="cheat[]" type="text"
                                                placeholder=" Chest Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Bottom/Sweep</th>


                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch (+)1 1/4"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch (+)1"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch (+) 3/4"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch (+)1/2"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch (+)1/4"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch 0"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch -1/4"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch -1/2"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }} name="bottom_sweep[]" value="inch -3/4"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="inch -1"
                                                type="radio"></td>
                                        <td class="inch"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="inch -1 1/4"
                                                type="radio"></td>

                                        <td class="cm"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm(+)1.5"
                                                type="radio"></td>
                                        <td class="cm"> <input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm(+)1"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm(+)0.8"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm(+)0.5"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm(+)0.3"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm(+)0"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm -0.3"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm -0.5"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm -0.8"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm -1"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return bottom_sweep(this);" {{
                                                old('bottom_sweep[]') }}name="bottom_sweep[]" value="cm -1.5"
                                                type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="bottom_sweep[]" type="text"
                                                placeholder="Bottom/Sweep   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sleeve Length</th>


                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return sleeve_lenght(this);"
                                                name="sleeve_lenght[]" value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="sleeve_lenght[]" type="text"
                                                placeholder="Sleeve Length   Measurements">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Across Shouler</th>

                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return across_shouler(this);"
                                                name="across_shouler[]" value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="across_shouler[]"
                                                type="text" placeholder="Across Shouler   Measurements">
                                        </td>
                                    </tr>


                                    <tr>
                                        <th>center back lenght</th>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch (+)1 1/4" type="radio">
                                        </td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch (+) 3/4" type="radio">
                                        </td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return center_back_lenght(this);"
                                                name="center_back_lenght[]" value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="center_back_lenght[]"
                                                type="text" placeholder="Center Back Length   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Armhole</th>

                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return armhole(this);" name="armhole[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="armhole[]" type="text"
                                                placeholder="Armhole   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hood Width</th>

                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_width(this);" name="hood_width[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="hood_width[]" type="text"
                                                placeholder="Hood Width   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hood Length</th>

                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return hood_length(this);"
                                                name="hood_length[]" value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hood_length(this);" name="hood_length[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="hood_length[]" type="text"
                                                placeholder="Hood Length   Measurements">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-sm-12" id="pantmeaserment" style="display: none">

                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th>Key Points</th>

                                        <th class="inch">inch (+)1 1/4</th>
                                        <th class="inch">inch (+)1</th>
                                        <th class="inch">inch (+) 3/4</th>
                                        <th class="inch">inch (+)1/2</th>
                                        <th class="inch">inch (+)1/4</th>
                                        <th class="inch">inch 0</th>
                                        <th class="inch">inch -1/4</th>
                                        <th class="inch">inch -1/2</th>
                                        <th class="inch">inch -3/4</th>
                                        <th class="inch">inch -1</th>
                                        <th class="inch">inch -1 1/4</th>
                                        <th class="cm">cm(+)1.5</th>
                                        <th class="cm">cm (+)1</th>
                                        <th class="cm">cm(+)0.8</th>
                                        <th class="cm">cm(+)0.5</th>
                                        <th class="cm">cm(+)0.3</th>
                                        <th class="cm">cm(+)0</th>
                                        <th class="cm">cm -0.3</th>
                                        <th class="cm">cm -0.5</th>
                                        <th class="cm">cm -0.8</th>
                                        <th class="cm">cm -1</th>
                                        <th class="cm">cm -1.5</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Waist</th>

                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"><input onclick="return waist(this);" name="waist[]"
                                                value="inch -1 1/4" type="radio"></td>




                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return waist(this);" name="waist[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]" value="cm -1"
                                                type="radio"></td>
                                        <td class="cm"><input onclick="return waist(this);" name="waist[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="waist[]" type="text"
                                                placeholder="Waist   Measurements">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Hip/Seat</th>

                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return hip_seat(this);" name="hip_seat[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="hip_seat[]" type="text"
                                                placeholder="Hip/seat   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Inseam</th>

                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return inseam(this);" name="inseam[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="inseam[]" type="text"
                                                placeholder="Inseam   Measurements">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Front Rise</th>

                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return front_rise(this);" name="front_rise[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="front_rise[]" type="text"
                                                placeholder="Front Rise   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Seat(Straight@
                                            bottom of the fly)</th>

                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return seat(this);" name="seat[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]" value="cm(+)1"
                                                type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]" value="cm(+)0"
                                                type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]" value="cm -1"
                                                type="radio"></td>
                                        <td class="cm"> <input onclick="return seat(this);" name="seat[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="seat[]" type="text"
                                                placeholder="Seat  Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Thigh</th>

                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch -1" type="radio"></td>
                                        <td class="inch"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return thigh(this);" name="thigh[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="thigh[]" type="text"
                                                placeholder="Thigh   Measurements">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Back Rise</th>

                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch (+)1 1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch (+)1" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch (+) 3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch (+)1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch (+)1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch 0" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch -1/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch -1/2" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch -3/4" type="radio"></td>
                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch -1" type="radio"></td>

                                        <td class="inch"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="inch -1 1/4" type="radio"></td>

                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm(+)1.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm(+)1" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm(+)0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm(+)0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm(+)0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm(+)0" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm -0.3" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm -0.5" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm -0.8" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm -1" type="radio"></td>
                                        <td class="cm"> <input onclick="return back_rise(this);" name="back_rise[]"
                                                value="cm -1.5" type="radio"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="30"> <input class="form-control" name="back_rise[]" type="text"
                                                placeholder="Back Rise   Measurements">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="tolarance">Remarks </label>
                                <input type="text" {{ old('tolarance') }} class="form-control" name="tolarance"
                                    placeholder="write your notes">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-success w-100">save</button>
                        </div>
                    </div>
                </div>
                <div id="msg" class="text-red text-center"></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function yesnoCheck() {
                if (document.getElementById('jacket_id').checked) {
                        document.getElementById('ifYes').style.display = 'block';
                } else {
                        document.getElementById('ifYes').style.display = 'none';
                }
                if (document.getElementById('pant').checked) {
                        document.getElementById('pantmeaserment').style.display = 'block';
                } else {
                        document.getElementById('pantmeaserment').style.display = 'none';
                }

        }

        function yesnoCheck_inch_cm() {

                if (document.getElementById('inch').checked) {

                      var elems=  document.querySelectorAll('.cm');

                        for (var i=0;i<elems.length;i+=1){
                             elems[i].style.display = 'none';
                        }
                        document.getElementById('cmdiv').style.display='none';
                    } else {
                     document.querySelectorAll('.cm').style=null;

                    }
                if (document.getElementById('centimetter').checked) {
                    var elems= document.querySelectorAll('.inch');
                    for (var i=0;i<elems.length;i+=1){
                             elems[i].style.display = 'none';
                        }
                        document.getElementById('inchdiv').style.display='none';


                }
                // else {
                //     var elems= document.querySelectorAll('.inch').style.display = 'none';
                //     for (var i=0;i<elems.length;i+=1){
                //              elems[i].style.display = 'none';
                //         }
                // }

        }




        function checkvalueOtherSize(val) {
                if (val === "OTHERS")
                        document.getElementById('text_field').style.display = 'block';
                else
                        document.getElementById('text_field').style.display = 'none';
        }


        function validateForm(form) {

                var departmentGroup = document.getElementsByName("cheat[]");


                var checkedDepartment = 0

                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }


                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function bottom_sweep(form) {
                var departmentGroup = document.getElementsByName("bottom_sweep[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function sleeve_lenght(form) {
                var departmentGroup = document.getElementsByName("sleeve_lenght[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function across_shouler(form) {
                var departmentGroup = document.getElementsByName("across_shouler[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function across_shouler(form) {
                var departmentGroup = document.getElementsByName("across_shouler[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function center_back_lenght(form) {
                var departmentGroup = document.getElementsByName("center_back_lenght[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function armhole(form) {
                var departmentGroup = document.getElementsByName("armhole[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function hood_width(form) {
                var departmentGroup = document.getElementsByName("hood_width[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function hood_length(form) {
                var departmentGroup = document.getElementsByName("hood_length[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function waist(form) {
                var departmentGroup = document.getElementsByName("waist[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function hip_seat(form) {
                var departmentGroup = document.getElementsByName("hip_seat[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function inseam(form) {
                var departmentGroup = document.getElementsByName("inseam[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function front_rise(form) {
                var departmentGroup = document.getElementsByName("front_rise[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function seat(form) {
                var departmentGroup = document.getElementsByName("seat[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function thigh(form) {
                var departmentGroup = document.getElementsByName("thigh[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }

        function back_rise(form) {
                var departmentGroup = document.getElementsByName("back_rise[]");
                var checkedDepartment = 0
                for (var i = 0; i < departmentGroup.length; i++) {
                        if (departmentGroup[i].checked) {
                                checkedDepartment++;
                        }
                }
                if (checkedDepartment >= 4) {
                        document.getElementById("msg").innerHTML = "Maximum Select Only Three";
                        return false;
                }

        }
</script>
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

{{-- <script>
    $('#inch').change(function(e) {
                e.preventDefault();
                var is_checked = $('#inch').prop('checked');

                if (is_checked) {
                        $('.inch').removeClass('d-none');

                } else {
                        $('.cm').addClass('d-none');
                        $('#cm').addClass('d-none');
                }
        })
</script>
<script>
    $('#cm').change(function(e) {
                e.preventDefault();
                var is_checked = $('#cm').prop('checked');
                if (is_checked) {

                        $('.cm').removeClass('d-none');

                } else {
                        $('.inch').addClass('d-none');
                        $('#inch').addClass('d-none');
                }
        })
</script> --}}
@endpush
