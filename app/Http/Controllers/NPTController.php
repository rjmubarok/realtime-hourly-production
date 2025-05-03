<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Floor;
use App\Models\Line;
use App\Models\NPT;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class NPTController extends Controller
{

    public function index()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;
        $allFloor = Floor::all()->pluck('name','id');
        $npts=NPT::

         where('floor_id',$floor_id)
        ->where('line_id',$line_id)
        ->whereDate('created_at', Carbon::today())->OrderBy('id', 'DESC')->get();



        return view('form.npt.npt_list', compact(['npts','allFloor']));
    }


    public function Create()
    {

        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $buyers = Buyer::whereStatus(1)->get();
        return view('form.npt.npt_form', compact(['floors', 'lines','buyers']));
    }

    public function Store(Request $request)
    {
        $this->validate($request, [
            'line_id' => 'required',
            'floor_id' => 'required',
            'buyer_id' => 'required',
            'npt' => 'required',
        ]);

        //dd($request->all());
        $npt = [
            'floor_id' => $request->floor_id,
            'line_id' => $request->line_id,
            'buyer_id' => $request->buyer_id,
            'style' => $request->style,
            'po' => $request->po,
            // 'npt'=>$request->npt,
            'npt' => $request->npt,
            'lost_minuite' => $request->lost_minuite,
            'reason' => $request->reason,

        ];
        $status = NPT::create($npt);

        if ($status) {
            return redirect()->back()->with(['success' => 'Successfully Created!']);
        } else {
            return redirect()->back();
        }


        //return $request->all();
    }
    public function npt_report()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        return view('report.npt.npt_report', compact(['floors', 'lines']));
    }
    public function npt_report_result(Request $request)
    {
        $from_search = $request->from . ' 00:00:00';
        $to_search = $request->to . '23:59:59';
        $from = $request->from;
        $to = $request->to;
        $style = strtolower($request->style);
        $diff_days = Carbon::parse($from)->diffInDays(Carbon::parse($to));
        $buyer_id = $request->buyer_id;
        $buyer_name = Buyer::where('id', $buyer_id)->first();
        $floor_id = $request->floor_id;
        $line_id = $request->line_id;

        $npts = NPT::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('buyer_id', $buyer_id)
            ->where('style', $style)
            ->with('floor', 'line', 'buyer')
            ->get();


        return view('report.npt.npt_report_view', compact('from', 'to', 'style',  'npts','buyer_name','diff_days'));
    }
}
