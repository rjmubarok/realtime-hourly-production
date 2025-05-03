@extends('master')
@section('content')

<div class="card-body">
    <div class="row">
        <div class="col">
            <table id="example" class="table table-striped datatable table-bordered">
            <thead>
    <tr style="background: linear-gradient(135deg, #000000, #000000); color: white; font-size: 18px; font-weight: bold;">
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Today's Target/Hourly
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Total Target/Effi(%)
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Yesterday T.Prod/Eff(%)
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Finishing Received
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Man Power
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Buyer Name
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Style
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Run Day
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Order Qty
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Color
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            PO
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            SMV
        </th>
        <th scope="col" style="padding: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            Comments
        </th>
    </tr>
</thead>

                <tbody>
                    @foreach($data as $generalData)
                    <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                        <td style="color:#d30589;">{{ $generalData->today_target?? ''}}</td>
                        <td>{{ $generalData->total_target ?? ''}}</td>
                        <td>{{ $generalData->total_production ?? ''}}</td>
                        <td>{{ $generalData->finishing_receive ?? ''}}</td>
                        <td style="color:blue;">{{ $generalData->man_power ?? ''}}</td>
                        <td style="color:Magenta;">{{ $generalData->buyer_name ?? ''}}</td>
                        <td style="color:#650871;">{{ $generalData->style ?? ''}}</td>
                        <td>{{ $generalData->run_day ?? ''}}</td>
                        <td>{{ $generalData->order_qty ?? ''}}</td>
                        <td>{{ $generalData->color ?? ''}}</td>
                        <td>{{ $generalData->po ?? ''}}</td>
                        <td style="color:blue;">{{ $generalData->smv ?? ''}}</td>
                        <td>
                            <h3 style="color:red;font-size:18px;">{{ $generalData->comments ?? ''}}</h3>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background: linear-gradient(135deg, #8B4513, #A0522D, #8B4513, #D2B48C);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);">
              <b>{{$qc_passed ?? 0}}</b>
        </h1>
            <h5 style="color: #FFFFFF;"><b>Total QC Passed</b></h5>
        </div>
        <div class="icon">
            <i class="fas fa-check-circle" style='color: #46ae19'></i>
        </div>
        {{-- <a href="#" class="small-box-footer">@lang('ln.More_info') <i
                class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>



    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <div class="small-box" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);">
            <b>{{$rectified ?? 0}}</b>
        </h1>


            <h5 style="color: #FFFFFF;"><b>Rectified</b></h5>
        </div>
        <div class="icon">
            <i class="fab fa-medapps" style='color: #cbf556'></i>
        </div>
        {{-- <a href="#" class="small-box-footer">@lang('ln.More_info') <i
                class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background: linear-gradient(135deg, #008080, #20B2AA);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.6);">
            <b>{{ $defected ?? 0 }}</b>
        </h1>
            <h5 style="color: #FFFFFF;"><b>Defected</b></h5>
        </div>
        <div class="icon">
            <i class="far fa-thumbs-down" style='color: #FF6347'></i>
        </div>
        {{-- <a href="#" class="small-box-footer">@lang('ln.More_info') <i
                class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background: linear-gradient(135deg, #d32f2f, #f44336);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.7);">
          <b>{{ $reject ?? 0 }}</b>
        </h1>
            <h5 style="color: #FFFFFF;"><b>Rejected</b></h5>
        </div>
        <div class="icon">
            <i class="fas fa-times-circle" style='color: #FFCDD2'></i>
        </div>
        {{-- <a href="#" class="small-box-footer">@lang('ln.More_info') <i
                class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background: linear-gradient(135deg, #6a1b9a, #8e24aa);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.6);">
          <b>{{ $total_check ?? 0 }}</b>
        </h1>


            <h5 style="color: #FFFFFF;"><b>Total Checked Today</b></h5>
        </div>
        <div class="icon">
            <i class="fas fa-check-double" style='color: #80cbc4'></i>
        </div>
        {{-- <a href="#" class="small-box-footer">@lang('ln.More_info') <i
                class="fas fa-arrow-circle-right"></i></a>--}}
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background: linear-gradient(135deg, #1976d2, #42a5f5);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.6);">
           <b>{{ $total_defect ?? 0 }}</b>
        </h1>


            <h5 style="color: #FFFFFF;"><b>Defects Quantity</b></h5>
        </div>
        <div class="icon">
            <i class="fa fa-thumbs-down" style='color: #ffccbc'></i>
        </div>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box" style="background: linear-gradient(135deg, #3f51b5, #5c6bc0);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);">
            <b>{{ number_format($dhu, 2) ?? 0 }}%</b>
        </h1>


            <h5 style="color: #FFFFFF;"><b>DHU</b></h5>
        </div>
        <div class="icon">
            <i class="fas fa-user-times" style='color: #ffab91'></i>
        </div>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box  -->
    <div class="small-box" style="background: linear-gradient(135deg, #800000, #b22222);">
        <div class="inner">
        <h1 style="font-size: 45px; color: #FFFFFF; text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.6);">
              <b>{{ number_format($average_eff, 2) ?? 0 }}%</b>
        </h1>


            <h5 style="color: #FFFFFF;"><b>Average Efficiency</b></h5>
        </div>
        <div class="icon">
            <i class="fas fa-chart-line" style='color: #ffd700'></i>
        </div>
    </div>
</div>

</div>
@if((\Illuminate\Support\Facades\Auth::user()->user_type==1) ||
(\Illuminate\Support\Facades\Auth::user()->user_type==3))
<div class="row">
    <div class="col-4">
        <table id="example" class="table table-striped datatable table-bordered">
            <thead>
                <!-- <h2 style="background-color:#0b354f;color:white;"><i> Hrly Prod. & Effi.</i></h2> -->


                <tr style="background-color: #E0FFFF; color: #B22222; font-size: 18px; font-weight: bold;">
    <th scope="col" style="padding: 10px 15px; border-radius: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Hour
    </th>
    <th scope="col" style="padding: 10px 15px; border-radius: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Hr.Production
    </th>
    <th scope="col" style="padding: 10px 15px; border-radius: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Hr.Effic
    </th>
</tr>


            </thead>
            {{-- <tbody>

                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>6-7 AM</td>
                    <td>{{$ramadan1 ?? '' }}</td>
                    <td>{{number_format($ramadan1_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>7-8 AM</td>
                    <td>{{$ramadan2 ?? '' }}</td>
                    <td>{{number_format($ramadan2_eff, 2)?? 0}} %</td>
                </tr>
               
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>8-9 AM</td>
                    <td>{{$first_hour ?? '' }}</td>
                    <td>{{number_format($first_eff, 2)?? 0}} %</td>
                </tr>


                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>9-10 AM</td>
                    <td>{{$sec_hour ?? '' }}</td>
                    <td>{{number_format($sec_eff, 2) ?? 0}} %</td>
                </tr>

                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>10-11 AM</td>
                    <td>{{$third_hour ?? '' }}</td>
                    <td>{{number_format($third_eff,2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>11-12 AM</td>
                    <td>{{$fourth_hour ?? '' }}</td>
                    <td>{{number_format($fourth_eff, 2)?? ''}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>12-1 PM</td>
                    <td>{{$fifth_hour ?? '' }}</td>
                    <td>{{number_format($fifth_eff,2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;color:red;">
                    <td>1-2 PM</td>
                    <td>{{$sixth_hour ?? '' }}</td>
                    <td>{{number_format($six_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>2-3 PM</td>
                    <td>{{$seventh_hour ?? '' }}</td>
                    <td>{{number_format($seven_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>3-4 PM</td>
                    <td>{{$eight_hour ?? '' }}</td>
                    <td>{{number_format($eight_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>4-5 PM</td>
                    <td>{{$nine_hour ?? '' }}</td>
                    <td>{{number_format($nine_eff, 2) ?? 0}} %</td>
                </tr>
                <!-- <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>5-6 PM</td>
                    <td>{{$ten_hour ?? '' }}</td>
                    <td>{{number_format($ten_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>6-7 PM</td>
                    <td>{{$ele_hour ?? '' }}</td>
                    <td>{{number_format($ele_eff, 2)?? 0 }} %</td>
                </tr> -->

                <!-- <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>7-8 PM</td>
                    <td>{{$twe_hour ?? '' }}</td>
                    <td>{{number_format($twe_eff, 2)?? 0 }} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>8-9 PM</td>
                    <td>{{$thirteen_hour ?? '' }}</td>
                    <td>{{number_format($thirteen_eff, 2)?? 0 }} %</td>
                </tr> -->
            </tbody> --}}
            <tbody>

                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>6-7 AM</td>
                    {{-- <td>{{$ramadan1 ?? '' }}</td> --}}

                    @if ($ramadan1==$today_target)
                    <td class="bg-success">{{$ramadan1 ?? '' }}</td>
                    @endif
                    @if ($ramadan1>$today_target)
                    <td class="bg-blue">{{$ramadan1 ?? '' }}</td>
                    @endif
                    @if ($ramadan1<$today_target) <td class="bg-warning">{{$ramadan1 ?? '' }}</td>
                    @endif
                    <td>{{number_format($ramadan1_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>7-8 AM</td>
                    {{-- <td>{{$ramadan2 ?? '' }}</td> --}}

                    @if ($ramadan2==$today_target)
                    <td class="bg-success">{{$ramadan2 ?? '' }}</td>
                    @endif
                    @if ($ramadan2>$today_target)
                    <td class="bg-blue">{{$ramadan2 ?? '' }}</td>
                    @endif
                    @if ($ramadan2<$today_target) <td class="bg-warning">{{$ramadan2 ?? '' }}</td>
                    @endif
                    <td>{{number_format($ramadan2_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>8-9 AM</td>
                    {{-- <td>{{$first_hour ?? '' }}</td> --}}

                    @if ($first_hour==$today_target)
                    <td class="bg-success">{{$first_hour ?? '' }}</td>
                    @endif
                    @if ($first_hour>$today_target)
                    <td class="bg-blue">{{$first_hour ?? '' }}</td>
                    @endif
                    @if ($first_hour<$today_target) <td class="bg-warning">{{$first_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($first_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>9-10 AM</td>
                    {{-- <td>{{$sec_hour ?? '' }}</td> --}}
                    @if ($sec_hour==$today_target)
                    <td class="bg-success">{{$sec_hour ?? '' }}</td>
                    @endif
                    @if ($sec_hour>$today_target)
                    <td class="bg-blue">{{$sec_hour ?? '' }}</td>
                    @endif
                    @if ($sec_hour<$today_target) <td class="bg-warning">{{$sec_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($sec_eff, 2) ?? 0}} %</td>
                </tr>

                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>10-11 AM</td>

                    @if ($third_hour==$today_target)
                    <td class="bg-success">{{$third_hour ?? '' }}</td>
                    @endif
                    @if ($third_hour>$today_target)
                    <td class="bg-blue">{{$third_hour ?? '' }}</td>
                    @endif
                    @if ($third_hour<$today_target) <td class="bg-warning">{{$third_hour ?? '' }}</td>
                    @endif
                        {{-- <td>{{$third_hour ?? '' }}</td> --}}
                    <td>{{number_format($third_eff,2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>11-12 AM</td>
                    @if ($fourth_hour==$today_target)
                    <td class="bg-success">{{$fourth_hour ?? '' }}</td>
                    @endif
                    @if ($fourth_hour>$today_target)
                    <td class="bg-blue">{{$fourth_hour ?? '' }}</td>
                    @endif
                    @if ($fourth_hour<$today_target) <td class="bg-warning">{{$fourth_hour ?? '' }}</td>
                    @endif
                    {{-- <td>{{$fourth_hour ?? '' }}</td> --}}
                    <td>{{number_format($fourth_eff, 2)?? ''}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>12-1 PM</td>
                    @if ($fifth_hour==$today_target)
                    <td class="bg-success">{{$fifth_hour ?? '' }}</td>
                    @endif
                    @if ($fifth_hour>$today_target)
                    <td class="bg-blue">{{$fifth_hour ?? '' }}</td>
                    @endif
                    @if ($fifth_hour<$today_target) <td class="bg-warning">{{$fifth_hour ?? '' }}</td>
                    @endif
                    {{-- <td>{{$fifth_hour ?? '' }}</td> --}}
                    <td>{{number_format($fifth_eff,2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;color:red;">
                    <td>1-2 PM</td>
                    {{-- <td>{{$sixth_hour ?? '' }}</td> --}}
                    @if ($sixth_hour==$today_target)
                    <td class="bg-success">{{$sixth_hour ?? '' }}</td>
                    @endif
                    @if ($sixth_hour>$today_target)
                    <td class="bg-blue">{{$sixth_hour ?? '' }}</td>
                    @endif
                    @if ($sixth_hour<$today_target) <td class="bg-warning">{{$sixth_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($six_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>2-3 PM</td>
                    {{-- <td>{{$seventh_hour ?? '' }}</td> --}}
                    @if ($seventh_hour==$today_target)
                    <td class="bg-success">{{$seventh_hour ?? '' }}</td>
                    @endif
                    @if ($seventh_hour>$today_target)
                    <td class="bg-blue">{{$seventh_hour ?? '' }}</td>
                    @endif
                    @if ($seventh_hour<$today_target) <td class="bg-warning">{{$seventh_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($seven_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>3-4 PM</td>
                    {{-- <td>{{$eight_hour ?? '' }}</td> --}}
                    @if ($eight_hour==$today_target)
                    <td class="bg-success">{{$eight_hour ?? '' }}</td>
                    @endif
                    @if ($eight_hour>$today_target)
                    <td class="bg-blue">{{$eight_hour ?? '' }}</td>
                    @endif
                    @if ($eight_hour<$today_target) <td class="bg-warning">{{$eight_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($eight_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>4-5 PM</td>
                    {{-- <td>{{$nine_hour ?? '' }}</td> --}}
                    @if ($nine_hour==$today_target)
                    <td class="bg-success">{{$nine_hour ?? '' }}</td>
                    @endif
                    @if ($nine_hour>$today_target)
                    <td class="bg-blue">{{$nine_hour ?? '' }}</td>
                    @endif
                    @if ($nine_hour<$today_target) <td class="bg-warning">{{$nine_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($nine_eff, 2) ?? 0}} %</td>
                </tr>
                <!-- <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>5-6 PM</td>
                    {{-- <td>{{$ten_hour ?? '' }}</td> --}}
                    @if ($ten_hour==$today_target)
                    <td class="bg-success">{{$ten_hour ?? '' }}</td>
                    @endif
                    @if ($ten_hour>$today_target)
                    <td class="bg-blue">{{$ten_hour ?? '' }}</td>
                    @endif
                    @if ($ten_hour<$today_target) <td class="bg-warning">{{$ten_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($ten_eff, 2)?? 0}} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>6-7 PM</td>
                    {{-- <td>{{$ele_hour ?? '' }}</td> --}}
                    @if ($ele_hour==$today_target)
                    <td class="bg-success">{{$ele_hour ?? '' }}</td>
                    @endif
                    @if ($ele_hour>$today_target)
                    <td class="bg-blue">{{$ele_hour ?? '' }}</td>
                    @endif
                    @if ($ele_hour<$today_target) <td class="bg-warning">{{$ele_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($ele_eff, 2)?? 0 }} %</td>
                </tr> -->
                <!-- <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>7-8 PM</td>
                    {{-- <td>{{$twe_hour ?? '' }}</td> --}}
                    @if ($twe_hour==$today_target)
                    <td class="bg-success">{{$twe_hour ?? '' }}</td>
                    @endif
                    @if ($twe_hour>$today_target)
                    <td class="bg-blue">{{$twe_hour ?? '' }}</td>
                    @endif
                    @if ($twe_hour<$today_target) <td class="bg-warning">{{$twe_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($twe_eff, 2)?? 0 }} %</td>
                </tr>
                <tr style="background-color:#f5eded;font-size:22px;font-weight:bold;">
                    <td>8-9 PM</td>
                    {{-- <td>{{$thirteen_hour ?? '' }}</td> --}}
                    @if ($thirteen_hour==$today_target)
                    <td class="bg-success">{{$thirteen_hour ?? '' }}</td>
                    @endif
                    @if ($thirteen_hour>$today_target)
                    <td class="bg-blue">{{$thirteen_hour ?? '' }}</td>
                    @endif
                    @if ($thirteen_hour<$today_target) <td class="bg-warning">{{$thirteen_hour ?? '' }}</td>
                    @endif
                    <td>{{number_format($thirteen_eff, 2)?? 0 }} %</td>
                </tr> -->
            </tbody>
        </table> <br>


        <div>
    <div class="col-lg-12 col-6" style="width: 90%; height: 200px;"> <!-- Adjust width and height using inline styles -->
        <!-- small box -->
        <div class="small-box" style="background: linear-gradient(135deg, #006400, #228B22, #32CD32, #98FB98, #8FBC8F); height: 100%;">
            <div class="inner d-flex flex-column justify-content-center" style="height: 100%;">
                <!-- <h1 style="font-size:45px; color: #FFFFFF;"><b>{{$total_lose_minute ?? 0}}</b></h1> -->
                <!-- <h5 style="color: #FFFFFF;"><b>Total Lost Minutes</b></h5> -->

                <h5 style="color: #fc0303;">
  <b>
    <a href="http://192.168.1.17:8001/npt" 
       style="color: #FFFFFF; text-decoration: none; background-color: #343a40; padding: 5px 10px; border-radius: 5px; display: inline-block;">
       See...Lost Minutes in NPT Details
    </a>
  </b>
</h5>
<span style="display: inline-block; margin-top: 10px;">
            <a href="{{ url('/target-page') }}" class="btn btn-success" style="background-color: #021409; border-radius: 25px; padding: 6px 15px; width: 100%; max-width: 300px; text-align: center;">
                <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Contact Responsible Person 
            </a>
        </span>


            </div>
        </div>
    </div>
</div>





    </div>
   
    
    <div class="col-8">
        <table id="example" class="table table-striped datatable table-bordered">
        <h2 style="background-color: #0b354f; color: white; padding: 5px 20px; border-radius: 10px; text-align: center;">
    <i>Top Defect Area</i>
</h2>

<thead>
<tr style="background-color: #87CEEB; color: #011414; font-size: 18px; font-weight: bold; border-radius: 10px;">
    <th scope="col" style="background-color: #08bcfc; padding: 10px 15px; border-radius: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Sl.
    </th>
    <th scope="col" style="padding: 10px 15px; border-radius: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        QC BY
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        OP Name
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        MC
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Process
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Defect Code
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Ten Card Status
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Color
    </th>
    <th scope="col" style="padding: 10px 15px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        Size
    </th>
    <th scope="col" style="padding: 10px 15px; border-radius: 10px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
        PO
    </th>
</tr>

</thead>

            <tbody>
                @foreach($datas as $data)
                <tr style="background-color:#b8f2d8;font-size:16px;font-weight:bold;">
                <th scope="row" style="background-color:  #0b354f; color: White; padding: 10px; border-radius: 5px;">
                   {{ $loop->iteration }}</th>
                    <td>{{ $data->user->name??'' }}</td>
                    <td>{{ $data->op_name?? '' }}</td>
                    <td>{{ $data->mc?? '' }}</td>
                    <td>{{$data->process?? '' }}</td>
                    <td style="font-size:18px;color:Maroon;">{{ $data->defect_code ??'' }}</td>

                    @if ($data->ten_cards=='GREEN-1' || $data->ten_cards=='GREEN-2'||
                    $data->ten_cards=='GREEN-3'||$data->ten_cards=='GREEN-4'||$data->ten_cards=='GREEN-5')
                    <td class="bg-green ">{{ $data->ten_cards?? '' }}</td>
                    @elseif($data->ten_cards=='YELLOW-6' || $data->ten_cards=='YELLOW-7'|| $data->ten_cards=='YELLOW-8')
                    <td class="bg-yellow text-white">{{ $data->ten_cards?? '' }}</td>
                    @elseif($data->ten_cards=='RED-9' || $data->ten_cards=='RED-10')
                    <td style="background-color:#ff0000; color:#ffffff">{{ $data->ten_cards?? '' }}</td>
                    @else
                    <td>{{ $data->ten_cards?? '' }}</td>
                    @endif

                    <td>{{ $data->color?? '' }}</td>
                    <td>{{ $data->size?? '' }}</td>
                    <td>{{ $data->po?? '' }}</td>
                    <!-- <td>{{$data->created_at->format('H:i:s')}}</td> -->

                    {{-- @if($data->output==1)--}}
                    {{-- <td>
                        <p>QC Passed</p>
                    </td>--}}
                    {{-- @elseif($data->output==2)--}}
                    {{-- <td>
                        <p>Rectified</p>
                    </td>--}}
                    {{-- @elseif($data->output==3)--}}
                    {{-- <td>
                        <p>Reject</p>
                    </td>--}}
                    {{-- @elseif($data->output==4)--}}
                    {{-- <td>
                        <p>Defected</p>
                    </td>--}}
                    {{-- @endif--}}
                    @endforeach
                <tr>
                    <td colspan="5">
                        {{ $datas->links() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Line Wise DHU</div>

            <div class="card-body">

                <canvas id="myChart" height="100px"></canvas>

            </div>

        </div>
    </div>


</div>




@endif

@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script type="text/javascript">
    var labels =  {{ Js::from($line_name) }};
    var dhus = {{ js::from($dhus) }} ;

    const data = {
        labels: labels,
        datasets: [{
            label: 'Line wise DHU %',
            backgroundColor: 'rgb(39,29,196)',
            borderColor: 'rgb(238,2,2)',
            borderWidth: 1,
            data: dhus,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

</script>



@endpush


@push('meta')
<meta http-equiv="refresh" content="20">
@endpush
