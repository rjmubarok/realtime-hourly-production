@extends('master')
@section('content')
<style>
    .table td,
    .table th {
        padding: 10px;
        font-size: 14px;
    }
</style>
<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <input type="button" class="btn btn-success no_print" id="hideMe" onclick="return window.print();"
            value="Print">
        <a href="javascript:void(0)" onclick="window.close();" class="btn btn-warning no_print">
            <i class="fas fa-fast-backward"></i> Closee
        </a>
    </div>
</div>
<div id="SelectToPrint">
    <div class="row">
        <div class="col">
            <div style="text-align: center;">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" style="height: 100px; width: 150px;" alt=""><br>
                <span>Unit-1,Gorat,Ashulia,Dhaka-Bangladesh</span><br>
                <u class="h4">Production Report</u><br>
                <span>Date: {{ date('M j, Y', strtotime($from)) }} to {{ date('M j, Y', strtotime($to)) }}</span>,
                <span>Day Count: {{$diff_days+1 ?? ''}}</span><br>
                <span>Floor Name: <b>{{$floor_name->name??''}}</b></span>,
                <span>Line Name: <b>{{ $line_name->name??'' }}</b></span>,
                <span>Buyer Name: <b>{{$buyer_name->name??''}}</b></span>,

            </div>

            <hr>
            <div class="row">
                <div class="col-md-4">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th class="text-center">Output Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($result as $key =>$data)
                            <tr>
                                <td class="text-center">{{$key}}</td>
                                <td class="text-center">{{ $data}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered details">
                        <thead>
                            <tr>
                                <th>PO</th>
                                <th class="text-center">Output Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($po_result as $key =>$data)
                            <tr>
                                <td class="text-center">{{$key}}</td>
                                <td class="text-center">{{ $data}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="col-md-4">
                    <table class="table table-bordered details">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th class="text-center">Output Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($size_result as $key =>$data)
                            <tr>
                                <td class="text-center">{{$key}}</td>
                                <td class="text-center">{{ $data}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <br>

            </div>
        </div>
    </div>
    <br>
    <h4 style="font-size:22px;background-color:aqua;color:#691111;text-align: center;">Top Defects Area →</h4>
    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th>Operator Name</th>
                        <th class="text-center">Defect  Code</th>
                        <th class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($buyer_defect as $data)
                    <tr style="font-size:100px;">
                        <td class="text-center">{{$data['op_name']}}</td>
                        <td class="text-center">{{$data['defect_code']}}</td>

                        <td class="text-center">1</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="col-md-3">

            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th>Defect Code</th>
                        <th class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($defect_result as $key =>$data)
                    <tr>
                        <td class="text-center">{{$key}}</td>
                        <td class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>


        <div class="col-md-3">
            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th>Machine Name</th>
                        <th class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($mc_result as $key =>$data)
                    <tr>
                        <td class="text-center">{{$key}}</td>
                        <td class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th>Process Name</th>
                        <th class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($process_result as $key =>$data)
                    <tr>
                        <td class="text-center">{{$key}}</td>
                        <td class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
