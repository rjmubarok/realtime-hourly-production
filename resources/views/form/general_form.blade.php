@extends('master')
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card card-info" style="">
                <form action="{{ route('generalFormSubmit' ) }}" name="generalForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="card-header bg-cyan">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title text-bold mt-2">General Info Input</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    @if (auth()->user()->user_type==='1')
                                    <a href="{{route('general_info' )}}" class="btn btn-primary"> General Info List </a>
                                    @else
                                        <a href="{{route('generalFormView' )}}" class="btn btn-primary"> General Info List </a>
                                    
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="card-body align-content-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="today_target">Today's Target ( Per Hour)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="today_target" id="today_target" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="total_target">Total Target/Effi(%)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="total_target" id="total_target" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="total_production">Yesterday T.Prod/Eff(%)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="total_production" id="total_production" class="form-control"
                                               value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="finishing_receive">Finishing Receive
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="finishing_receive" id="finishing_receive" class="form-control"
                                               value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="man_power">Man Power
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" min="0" name="man_power" id="man_power" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="buyer_name">Buyer Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="buyer_name" id="buyer_name" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="style">Style
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="style" id="style" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="run_day">Run Day
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="run_day" id="run_day" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="order_qty">Order Qty
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="order_qty" id="order_qty" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="color">Color
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="color" id="color" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="po">PO
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="po" id="po" class="form-control" value=""
                                               required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="smv">SMV
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"  min="0" name="smv" id="smv" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="comment">Comments
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="comments" id="comments" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success w-100">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
