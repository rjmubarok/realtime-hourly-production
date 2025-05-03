<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\Floor;
use App\Models\Line;
use App\Models\QualityCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NewReportController extends Controller
{
    public function buyer_new_report()
    {

        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $buyers = Buyer::whereStatus(1)->get();
        return view('report.newReport.buyer_report_new', compact('buyers', 'floors', 'lines'));
    }

    public function buyer_new_report_result(Request $request)
    {
        try {
            $from_search = $request->from . ' 00:00:00';
            $to_search = $request->to . '23:59:59';
            $from = $request->from;
            $to = $request->to;
            $style = strtolower($request->style);
            $diff_days = Carbon::parse($from)->diffInDays(Carbon::parse($to));
            $floor_id = $request->floor_id;
            $line_id = $request->line_id;
            $buyer_id = $request->buyer_id;
            $buyer_name = Buyer::where('id', $buyer_id)->first();
            $floor_name = Floor::where('id', $floor_id)->first();
            $line_name = Line::where('id', $line_id)->first();

            $buyer_result = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->where('buyer_id', $buyer_id)
                ->where('style', $style)
                ->with('buyer')
                ->get();

            $buyer_defect = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('output', 4)
                ->where('buyer_id', $buyer_id)
                ->where('style', $style)
                ->with('buyer')
                ->get();
            $defected_data = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('output', 4)
                ->where('buyer_id', $buyer_id)
                ->where('style', $style)
                ->with('buyer')
                ->get();
            // return $defected_data;

            $result = [];
            foreach ($buyer_result as $item) {
                if (!isset($result[$item->color])) {
                    $result[$item->color] = 1;
                } else {
                    $result[$item->color] = $result[$item->color] + 1;
                }
            }

            $po_result = [];
            foreach ($buyer_result as $item) {
                if (!isset($po_result[$item->po])) {
                    $po_result[$item->po] = 1;
                } else {
                    $po_result[$item->po] = $po_result[$item->po] + 1;
                }
            }

            $size_result = [];
            foreach ($buyer_result as $item) {
                if (!isset($size_result[$item->size])) {
                    $size_result[$item->size] = 1;
                } else {
                    $size_result[$item->size] = $size_result[$item->size] + 1;
                }
            }

            $defect_result = [];

            foreach ($buyer_defect as $item) {
                if (!isset($defect_result[$item->defect_code])) {
                    $defect_result[$item->defect_code] = 1;
                } else {
                    $defect_result[$item->defect_code] = $defect_result[$item->defect_code] + 1;
                }
            }
            // return $defect_result;
            $operator_result = [];

            foreach ($buyer_defect as $item) {
                if (!isset($operator_result[$item->op_name])) {
                    $operator_result[$item->op_name] = 1;
                } else {
                    $operator_result[$item->op_name] = $operator_result[$item->op_name] + 1;
                }
            }

            $mc_result = [];

            foreach ($buyer_defect as $item) {
                if (!isset($mc_result[$item->mc])) {
                    $mc_result[$item->mc] = 1;
                } else {
                    $mc_result[$item->mc] = $mc_result[$item->mc] + 1;
                }
            }

            $process_result = [];

            foreach ($buyer_defect as $item) {
                if (!isset($process_result[$item->process])) {
                    $process_result[$item->process] = 1;
                } else {
                    $process_result[$item->process] = $process_result[$item->process] + 1;
                }
            }

            return view('report.newReport.new_buyer_report_view', compact('from', 'to', 'result', 'po_result', 'size_result', 'defect_result', 'buyer_name', 'diff_days', 'style', 'operator_result', 'mc_result', 'process_result', 'buyer_result', 'defected_data','floor_name','line_name','buyer_defect'));
        } catch (\Throwable $th) {

            Session::flash('message_validation', 'Failed to Load Report!');

            return Redirect::back();
        }


    }
}
