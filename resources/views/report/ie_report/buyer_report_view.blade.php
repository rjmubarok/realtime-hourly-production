@extends('master')
@section('content')
<style>
    .table td,
    .table th {
        padding: 10px;
        font-size: 28px;
        border: 2px solid #4CAF50;
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
            <div style="text-align: center;font-size:16px;font-weight:bold;">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" style="height: 100px; width: 150px;" alt=""><br>
                <span>Unit-1,Gorat,Ashulia,Dhaka-Bangladesh</span><br>
                <u class="h4">Production/Defects Report</u><br>
                <span>Date: {{ date('M j, Y', strtotime($from)) }} to {{ date('M j, Y', strtotime($to)) }}</span>,
                <span>Day Count: {{$diff_days+1 ?? ''}}</span><br>
                <span>Floor Name: <b>{{$floor_name->name??''}}</b></span>,
                <span>Line Name: <b>{{ $line_name->name??'' }}</b></span>,
                <span>Buyer Name: <b>{{$buyer_name->name??''}}</b></span>,
                <span>Style: <b>{{$style ?? ''}}</b></span>, <span><u><b> Production: {{count($buyer_result)?? ''}}</b></u></span>

            </div>

            <hr>
            <div class="row">
                <div class="col-md-4">

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Color</th>
                                <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Output Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($result as $key =>$data)
                            <tr>
                                <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                                <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-bordered details">
                        <thead>
                            <tr>
                                <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>PO</th>
                                <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Output Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($po_result as $key =>$data)
                            <tr>
                                <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                                <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="col-md-4">
                    <table class="table table-bordered details">
                        <thead>
                            <tr>
                                <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Size</th>
                                <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Output Quantity</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($size_result as $key =>$data)
                            <tr>
                                <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                                <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
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
    
    <h4 style="
    font-size: 24px;
    background-color: #ffcc00; /* Bold yellow background */
    color: #4a4a4a; /* Dark gray text for contrast */
    text-align: center;
    padding: 6px;
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Stronger shadow */
    font-weight: bold;
    text-transform: uppercase; /* Make the text uppercase for emphasis */
    letter-spacing: 1px; /* Add space between letters for a stylish look */
">
    Top Defects Area →
</h4>


    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Operator Name</th>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($operator_result as $key =>$data)
                    <tr>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="col-md-3">

            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Defect Code</th>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($defect_result as $key =>$data)
                    <tr>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="col-md-2">
            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Machine Name</th>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($mc_result as $key =>$data)
                    <tr>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-2">
            <table class="table table-bordered details">
                <thead>
                    <tr>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Process Name</th>
                        <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center">Defect Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($process_result as $key =>$data)
                    <tr>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
                        <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- //tencard -->
 <div class="col-md-2">
<table class="table table-bordered details">
    <thead>
        <tr>
            <th style=font-size:20px;font-weight:bold;background-color:#f5eded;>Ten Cards</th>
            <th style=font-size:20px;font-weight:bold;background-color:#f5eded; class="text-center"> Quantity</th>
        </tr>
    </thead>

    <tbody>
        @foreach($tens_result as $key =>$data)
        <tr>
            <td style=font-size:18px;font-weight:bold; class="text-center">{{$key}}</td>
            <td style=font-size:18px;font-weight:bold; class="text-center">{{ $data}}</td>
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
