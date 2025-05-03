@extends('master')
@section('content')
    <style>
        .table td, .table th {
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
                <i class="fas fa-fast-backward"></i> Close
            </a>
        </div>
    </div>
    <div id="SelectToPrint">
        <div class="row">
            <div class="col">
                <div style="text-align: center;">
                    <img src="{{asset('dist/img/AdminLTELogo.png')}}" style="height: 200px; width: 300px;" alt=""><br>
                    <span>Dhaka, Bangladesh</span><br>
                    <u class="h4">IE (Generel Report ) Report</u><br>
                    <span>Buyer Name: <b>{{$buyer_name->name?? ''}}</b></span>, <span>Style: {{$style ?? ''}}</span> <span><br>
                    <span>Date: {{ date('M j, Y', strtotime($from)) }} to {{ date('M j, Y', strtotime($to)) }}</span><br>
                </div>
                <hr>
                <table class="table table-bordered details">
                    <thead>
                        <tr>
                            <th>Output</th>
                            <th class="text-center">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">QC Passed</td>
                            <td class="text-center">{{$qc_passed?? '0'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Rectified</td>
                            <td class="text-center">{{$rectified ?? '0'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Reject</td>
                            <td class="text-center">{{$reject?? '0'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Defected</td>
                            <td class="text-center">{{$defected ?? '0'}}</td>
                        </tr>

                    </tbody>

                </table>
                <div class="row">
                    <div class="col text-left mt-5">
                        {{ auth()->user()->name }}<br>
                        Created By
                    </div>
                    <div class="col text-right mt-5">Authorized Signature</div>
                </div>
            </div>
        </div>
    </div>
@endsection
