<?php

namespace App\Http\Controllers;

use App\Models\OperatorPerformance;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Designation;
use App\Models\Floor;
use App\Models\Line;
use App\Models\MC;
use App\Models\Operator;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OperatorPerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $buyers = Buyer::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $operators = Operator::where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();
        $designations = Designation::whereStatus(1)->get();
        return view('operator_performances.create', compact('floors', 'lines', 'buyers', 'operators', 'designations'));
    }
    public function opp_report()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $buyers = Buyer::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $operators = Operator::where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();
        $designations = Designation::whereStatus(1)->get();
        return view('operator_performances.report', compact('floors', 'lines', 'buyers', 'operators', 'designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        try {
            $this->validate($request, [
                'line_id' => 'required',
                'floor_id' => 'required',
                'buyer_id' => 'required',
                'operator_id' => 'required',
                'designation_id' => 'required',
            ]);

            //dd($request->all());
            $operatorPerformance = [
                'created_by' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'buyer_id' => $request->buyer_id,
                'operator_id' => $request->operator_id,
                'designation_id' => $request->designation_id,
                'style' => $request->style,
                'join_date' => $request->join_date,
                'running_process' => $request->running_process,
                'smv' => $request->smv,
                'avg_cycle_time' => $request->avg_cycle_time,
                'target' => $request->target,
                'achieved' => $request->achieved,
            ];
            $status = OperatorPerformance::create($operatorPerformance);
            //dd( $status);
            if ($status) {
                return redirect()->back()->with(['success' => 'Successfully Created!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OperatorPerformance  $operatorPerformance
     * @return \Illuminate\Http\Response
     */
    public function opp_report_view(Request $request)
    {
       // return $request->all();
        try {
           
            $style = $request->style;
            $line_id = $request->line_id;
            $floor_id = $request->floor_id;
            $buyer_id = $request->buyer_id;
            $buyer_name = Buyer::where('id', $buyer_id)->first();
            $floor_name = Floor::where('id', $floor_id)->first();
            $line_name = Line::where('id', $line_id)->first();
            $OperatorPerformances = OperatorPerformance::
             where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('buyer_id', $buyer_id)
            ->where('style', $style)
            ->with('buyer','operator','designation')
            ->OrderBy('id', 'ASC')
            ->get();
           // return $OperatorPerformances;
            return view('operator_performances.report_view', compact('OperatorPerformances','line_name','floor_name','buyer_name','style'));
        } catch (\Throwable $th) {
            Session::flash('message_validation', 'Failed to Load Report!');

            return Redirect::back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OperatorPerformance  $operatorPerformance
     * @return \Illuminate\Http\Response
     */
    public function edit(OperatorPerformance $operatorPerformance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OperatorPerformance  $operatorPerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperatorPerformance $operatorPerformance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OperatorPerformance  $operatorPerformance
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatorPerformance $operatorPerformance)
    {
        //
    }
}
