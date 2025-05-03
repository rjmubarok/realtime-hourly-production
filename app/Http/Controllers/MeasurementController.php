<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Floor;
use App\Models\Line;
use App\Models\Measurement;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MeasurementController extends Controller
{
    public function Measurement_form()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;

        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
       // return $lines;
        $buyers = Buyer::whereStatus(1)->get();
        $sizes = Size::
             where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('status', 1)
            ->latest()
            ->get();
        return view('measurement.measurement_form', compact(['floors', 'lines','buyers','sizes']));
    }
    public function Measurement_store(Request $request)
    {
        $this->validate($request, [
            'line_id' => 'required',
            'floor_id' => 'required',
            'buyer_id' => 'required',
            'aw_bw' => 'required',
        ]);

        //dd($request->all());
        $measurment = [
            'floor_id' => $request->floor_id,
            'line_id' => $request->line_id,
            'buyer_id' => $request->buyer_id,
            'style' => $request->style,
            'po' => $request->po,
            'jacket_pant' => $request->jacket_pant,
            'cheat' => json_encode($request->cheat),
            'bottom_sweep' => json_encode($request->bottom_sweep),
            'sleeve_lenght' => json_encode($request->sleeve_lenght),
            'across_shouler' => json_encode($request->across_shouler),
            'armhole' => json_encode($request->armhole),
            'center_back_lenght' => json_encode($request->center_back_lenght),
            'hood_length' => json_encode($request->hood_length),
            'hood_width' => json_encode($request->hood_width),
            'waist' => json_encode($request->waist),
            'hip_seat' => json_encode($request->hip_seat),
            'inseam' => json_encode($request->inseam),
            'front_rise' => json_encode($request->front_rise),
            'seat' => json_encode($request->seat),
            'thigh' => json_encode($request->thigh),
            'back_rise' => json_encode($request->back_rise),
            'aw_bw' => $request->aw_bw,
            'size' => $request->size == 'OTHERS' ? $request->other_size : $request->size,
            'tolarance' => $request->tolarance,

        ];
        $status = Measurement::create($measurment);
        //dd( $status);
        if ($status) {
            return redirect()->route('measurement')->with(['success' => 'Successfully Created!']);
        } else {
            return redirect()->back();
        }


        //return $request->all();
    }

    public function Measurement()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;
        $measurments = Measurement::where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())->OrderBy('id', 'DESC')->get();
        //return $measurments;
       // return $measurments;
        return view('measurement.measurement', compact(['measurments']));
    }
    public function MeasurementReport()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $buyers  = Buyer::whereStatus(1)->get();
        return view('report.measurment.mesurment_report', compact(['floors', 'lines','buyers']));
    }
    public function measurment_report_result(Request $request)
    {

        $from_search = $request->from . ' 00:00:00';
        $to_search = $request->to . '23:59:59';
        $from = $request->from;
        $to = $request->to;
        $style = strtolower($request->style);
        $diff_days = Carbon::parse($from)->diffInDays(Carbon::parse($to));
        $floor_id = $request->floor_id;
        $line_id = $request->line_id;
        $floor_id = $request->floor_id;
        $buyer_id = $request->buyer_id;
        $buyer_name = Buyer::where('id', $buyer_id)->first();
        $floor_name = Floor::where('id', $floor_id)->first();
        $line_name = Line::where('id', $line_id)->first();

        $measurments = Measurement::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('buyer_id', $buyer_id)
            ->where('style', $style)
            ->with('buyer')
            ->OrderBy('id', 'DESC')
            ->get();
        //return $measurments;
        return view('report.measurment.measurment_report_view', compact('from', 'to', 'style',  'measurments', 'diff_days', 'buyer_name','floor_name','line_name'));
    }
}
