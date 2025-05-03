<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Floor;
use App\Models\GeneralInfo;
use App\Models\Line;
use App\Models\QualityCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function general_report()
    {
        $floors = Floor::whereStatus(1)->get();
        $buyers = Buyer::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        return view('report.general_report.general_report', compact('buyers', 'floors', 'lines'));
    }

    public function general_report_result(Request $request)
    {
        try {
            $from_search = $request->from . ' 00:00:00';
            $to_search = $request->to . '23:59:59';
            $from = $request->from;
            $to = $request->to;
            $buyer_id = $request->buyer_id;
            $output_all = QualityCheck::query();
            // Targeted Data
            $output_date = $output_all->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)]);
            $vouchers = $output_date->orderBy('created_at', 'ASC')->get();

            $buyer_name = Buyer::where('id', $buyer_id)->first();

            $style = strtolower($request->style);
            $qc_passed = 0;
            $rectified = 0;
            $reject = 0;
            $defected = 0;

            foreach ($vouchers as $key => $item) {
                $qc_passed = $vouchers->where('output', 1)
                    ->where('buyer_id', $buyer_id)
                    ->where('style', $style)
                    ->count();

                $rectified = $vouchers->where('output', 2)
                    ->where('buyer_id', $buyer_id)
                    ->where('style', $style)
                    ->count();

                $reject = $vouchers->where('output', 3)
                    ->where('buyer_id', $buyer_id)
                    ->where('style', $style)
                    ->count();

                $defected = $vouchers->where('output', 4)
                    ->where('buyer_id', $buyer_id)
                    ->where('style', $style)
                    ->count();
            }

            return view('report.general_report.view', compact(
                'vouchers',
                'from',
                'to',
                'qc_passed',
                'rectified',
                'reject',
                'defected',
                'buyer_id',
                'buyer_name',
                'style'
            ));
        } catch (\Throwable $th) {
            Session::flash('message_validation', 'Failed to Load Report!');
            return Redirect::back();
        }
    }

    public function general_report_details(Request $request, $id)
    {
        try {
            $from_search = $request->from . ' 00:00:00';
            $to_search = $request->to . '23:59:59';
            $from = $request->from;
            $to = $request->to;
            $output_all = QualityCheck::query();
            // Targeted Data
            $output_date = $output_all->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)]);
            $vouchers = $output_date->orderBy('created_at', 'ASC')->get();
            $qc_passed = 0;
            $rectified = 0;
            $reject = 0;
            $defected = 0;

            foreach ($vouchers as $key => $item) {
                $qc_passed = $vouchers->where('output', $id);
            }
            return view('report.general_report.view', compact('vouchers', 'from', 'to', 'qc_passed', 'rectified', 'reject', 'defected'));
        } catch (\Throwable $th) {
            Session::flash('message_validation', 'Failed to Load Report!');
            return Redirect::back();
        }
    }

    public function ie_report()
    {
        $buyers = Buyer::whereStatus(1)->get();
        return view('report.ie_report.ie_report', compact('buyers'));
    }

    public function ie_report_result(Request $request)
    {
        try {
            $from_search = $request->from . ' 00:00:00';
            $to_search = $request->to . '23:59:59';
            $from = $request->from;
            $to = $request->to;
            $color = strtolower($request->color);
            $buyer_id = $request->buyer_id;
            $output_date = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)]);
            if ($buyer_id) {
                $buyer_result = $output_date->where('buyer_id', $buyer_id)->count();
            }
            $colorResult = $output_date->where('color', $color)->count();
            return view('report.ie_report.view', compact('colorResult', 'from', 'to', 'color', 'buyer_result'));
        } catch (\Throwable $th) {
            Session::flash('message_validation', 'Failed to Load Report!');
            return Redirect::back();
        }
    }

    /*Buyer Report*/

    public function buyer_report()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $buyers = Buyer::whereStatus(1)->get();
        return view('report.ie_report.buyer_report', compact('buyers', 'floors', 'lines'));
    }

    public function buyer_report_result(Request $request)
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
            //return $buyer_result;
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

            // tens results
            $tens_result = [];
            foreach ($buyer_defect as $item) {
                if (!isset($tens_result[$item->ten_cards])) {
                    $tens_result[$item->ten_cards] = 1;
                } else {
                    $tens_result[$item->ten_cards] = $tens_result[$item->ten_cards] + 1;
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

            return view('report.ie_report.buyer_report_view', compact('from', 'to', 'result', 'po_result', 'size_result', 'defect_result', 'buyer_name', 'diff_days', 'style', 'operator_result', 'mc_result', 'process_result', 'buyer_result', 'defected_data', 'floor_name', 'line_name','tens_result'));
        } catch (\Throwable $th) {

            Session::flash('message_validation', 'Failed to Load Report!');

            return Redirect::back();
        }
    }

    public function dhu_report()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        return view('report.dhu_report.search_dhu_report', compact('floors', 'lines'));
    }

    public function dhu_report_result(Request $request)
    {
        try {
            $from_search = $request->from . ' 00:00:00';
            $to_search = $request->to . '23:59:59';
            $from = $request->from;
            $to = $request->to;
            $floor_id = $request->floor_id;
            $line_id = $request->line_id;
            //   $buyer_id = $request->buyer_id;
            $output_date = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)]);
            $general_data = $output_date->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get();
            $smv_date_data = GeneralInfo::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get();

            $man_power = GeneralInfo::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get();

            // return $smv_date_data;
            $smv = $smv_date_data->avg('smv') ?? 0;
            // return $smv;




            $man_power = $smv_date_data->avg('man_power') ?? 1;
            // return $man_power;

            $pre_eff = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            //return $pre_eff;
            // $avg_eff = ((($pre_eff * $smv) / ($man_power * 60)) * 100);
            // return $avg_eff;
            $first_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '08:00')
                ->whereTime('created_at', '<', '09:00')
                ->get()
                ->count();
            $first_eff = ((($first_hour * $smv) / ($man_power * 60)) * 100);
            $sec_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '09:00')
                ->whereTime('created_at', '<', '10:00')
                ->get()
                ->count();
            $sec_eff = ((($sec_hour * $smv) / ($man_power * 60)) * 100);
            $third_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '10:00')
                ->whereTime('created_at', '<', '11:00')
                ->get()
                ->count();
            $third_eff = ((($third_hour * $smv) / ($man_power * 60)) * 100);
            $fourth_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '11:00')
                ->whereTime('created_at', '<', '12:00')
                ->get()
                ->count();
            $fourth_eff = ((($fourth_hour * $smv) / ($man_power * 60)) * 100);
            $fifth_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '12:00')
                ->whereTime('created_at', '<', '13:00')
                ->get()
                ->count();
            $fifth_eff = ((($fifth_hour * $smv) / ($man_power * 60)) * 100);
            $sixth_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '13:00')
                ->whereTime('created_at', '<', '14:00')
                ->get()
                ->count();
            $six_eff = ((($sixth_hour * $smv) / ($man_power * 60)) * 100);
            $seventh_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '14:00')
                ->whereTime('created_at', '<', '15:00')
                ->get()
                ->count();
            $seven_eff = ((($seventh_hour * $smv) / ($man_power * 60)) * 100);
            $eight_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '15:00')
                ->whereTime('created_at', '<', '16:00')
                ->get()
                ->count();
            $eight_eff = ((($eight_hour * $smv) / ($man_power * 60)) * 100);
            $nine_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '16:00')
                ->whereTime('created_at', '<', '17:00')
                ->get()
                ->count();
            $nine_eff = ((($nine_hour * $smv) / ($man_power * 60)) * 100);
            $ten_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '17:00')
                ->whereTime('created_at', '<', '18:00')
                ->get()
                ->count();
            $ten_eff = ((($ten_hour * $smv) / ($man_power * 60)) * 100);
            $ele_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '18:00')
                ->whereTime('created_at', '<', '19:00')
                ->get()
                ->count();
            $ele_eff = ((($ele_hour * $smv) / ($man_power * 60)) * 100);
            $twe_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '19:00')
                ->whereTime('created_at', '<', '20:00')
                ->get()
                ->count();
            $twe_eff = ((($twe_hour * $smv) / ($man_power * 60)) * 100);

            $thirteen_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->whereTime('created_at', '>=', '20:00')
                ->whereTime('created_at', '<', '21:00')
                ->get()
                ->count();
            $thirteen_eff = ((($thirteen_hour * $smv) / ($man_power * 60)) * 100);

            /*Dynamic Effici*/
            $average_no = 0;
            if ($first_eff > 0) {
                ++$average_no;
            }
            if ($sec_eff > 0) {
                ++$average_no;
            }
            if ($third_eff > 0) {
                ++$average_no;
            }
            if ($fourth_eff > 0) {
                ++$average_no;
            }
            if ($fifth_eff > 0) {
                ++$average_no;
            }
            if ($six_eff > 0) {
                ++$average_no;
            }
            if ($seven_eff > 0) {
                ++$average_no;
            }
            if ($eight_eff > 0) {
                ++$average_no;
            }
            if ($nine_eff > 0) {
                ++$average_no;
            }
            if ($ten_eff > 0) {
                ++$average_no;
            }
            if ($ele_eff > 0) {
                ++$average_no;
            }
            if ($twe_eff > 0) {
                ++$average_no;
            }
            if ($thirteen_eff > 0) {
                ++$average_no;
            }

            if ($average_no != 0) {
                $avg_eff = (($first_eff + $sec_eff + $third_eff + $fourth_eff + $fifth_eff + $six_eff + $seven_eff + $eight_eff + $nine_eff + $ten_eff + $ele_eff + $twe_eff
                    + $thirteen_eff) / $average_no);
            } else {
                $avg_eff = 0;
            }


            $total_check = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $total_defect = QualityCheck::whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->sum('defect_quantity');

            if ($total_check != 0) {
                $dhu = ($total_defect / $total_check) * 100;
            } else {
                $dhu = 0;
            }

            return view('report.dhu_report.view', compact('avg_eff', 'from', 'to', 'dhu'));
        } catch (\Throwable $th) {
            Session::flash('message_validation', 'Failed to Load Report!');
            return Redirect::back();
        }
    }


    public function quality_report()
    {
        return view('report.qc_report.quality_report');
    }
    public function quality_report_result(Request $request)
    {
        try {
            $from_search = $request->from . ' 00:00:00';
            $to_search = $request->to . '23:59:59';
            $from = $request->from;
            $to = $request->to;
            $diff_days = Carbon::parse($from)->diffInDays(Carbon::parse($to));

            $allFloor = Floor::all()->pluck('name', 'id');
            $generalInfoData = GeneralInfo::leftJoin('lines', 'general_infos.line_id', '=', 'lines.id')
                ->leftJoin('floors', 'general_infos.floor_id', '=', 'floors.id')

                ->whereBetween('general_infos.created_at', [new Carbon($from_search), new Carbon($to_search)])
                ->orderBy('line_id', 'ASC')
                ->get([
                    'general_infos.id',
                    'general_infos.floor_id',
                    'general_infos.line_id',
                    'general_infos.created_at',
                    'general_infos.buyer_name',
                    'general_infos.style',
                    'general_infos.run_day',
                    'general_infos.smv',
                    'general_infos.total_target',
                    'general_infos.today_target',
                    'general_infos.comments',

                    'lines.name as line_name',
                    'floors.name as floor_name',
                ])->toArray();
            //   return $generalInfoData;
            $tableData = [];
            foreach ($generalInfoData as $datum) {
                $tableData[$datum['line_id']][] = $datum;
            }

            foreach ($tableData as $tblIndex => $singleTblData) {

                foreach ($singleTblData as $lineIndex => $lineData) {
                    $tableData[$tblIndex][$lineIndex]['qc_passed'] = QualityCheck::where('output', 1)
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('floor_id', $lineData['floor_id'])
                        ->where('line_id', $lineData['line_id'])
                        ->get()->count();
                    $tableData[$tblIndex][$lineIndex]['rectified'] = QualityCheck::where('output', 2)
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('floor_id', $lineData['floor_id'])
                        ->where('line_id', $lineData['line_id'])
                        ->get()->count();
                    $tableData[$tblIndex][$lineIndex]['reject'] = QualityCheck::where('output', 3)
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('floor_id', $lineData['floor_id'])
                        ->where('line_id', $lineData['line_id'])
                        ->get()->count();
                    $tableData[$tblIndex][$lineIndex]['defected'] = QualityCheck::where('output', 4)
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('floor_id', $lineData['floor_id'])
                        ->where('line_id', $lineData['line_id'])
                        ->get()->count();

                    $tableData[$tblIndex][$lineIndex]['total_check'] = QualityCheck::where('floor_id', $lineData['floor_id'])
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('line_id', $lineData['line_id'])
                        ->get()
                        ->count();
                    $tableData[$tblIndex][$lineIndex]['defect_code_count'] = QualityCheck::where('floor_id', $lineData['floor_id'])
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('line_id', $lineData['line_id'])
                        ->where('output', 4)
                        ->get()
                        ->count();
                    //  return $tableData[$tblIndex][$lineIndex]['total_check'] ;
                    $tableData[$tblIndex][$lineIndex]['total_defect'] = QualityCheck::where('floor_id', $lineData['floor_id'])
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('line_id', $lineData['line_id'])
                        ->sum('defect_quantity');
                    //return $tableData[$tblIndex][$lineIndex]['total_defect'];
                    $tableData[$tblIndex][$lineIndex]['defect_code'] = (QualityCheck::where('floor_id', $lineData['floor_id'])
                        ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
                        ->where('line_id', $lineData['line_id'])
                        ->select(DB::raw('group_concat(defect_code) as defect_code'))->first())->defect_code;

                    if ($tableData[$tblIndex][$lineIndex]['total_check'] != 0) {
                        $tableData[$tblIndex][$lineIndex]['dhu'] = ($tableData[$tblIndex][$lineIndex]['total_defect'] / $tableData[$tblIndex][$lineIndex]['total_check']) * 100;
                    } else {
                        $tableData[$tblIndex][$lineIndex]['dhu'] = 0;
                    }
                    //  return   $tableData[$tblIndex][$lineIndex]['dhu'] ;

                    $returnData = $this->prprAverage_eff($lineData['floor_id'], $lineData['line_id'], $from_search, $to_search);
                    $tableData[$tblIndex][$lineIndex]['first_hour'] = $returnData['first_hour'];
                    $tableData[$tblIndex][$lineIndex]['first_eff'] = $returnData['first_eff'];
                    $tableData[$tblIndex][$lineIndex]['sec_hour'] = $returnData['sec_hour'];
                    $tableData[$tblIndex][$lineIndex]['sec_eff'] = $returnData['sec_eff'];
                    $tableData[$tblIndex][$lineIndex]['third_hour'] = $returnData['third_hour'];
                    $tableData[$tblIndex][$lineIndex]['third_eff'] = $returnData['third_eff'];
                    $tableData[$tblIndex][$lineIndex]['fourth_hour'] = $returnData['fourth_hour'];
                    $tableData[$tblIndex][$lineIndex]['fourth_eff'] = $returnData['fourth_eff'];
                    $tableData[$tblIndex][$lineIndex]['fifth_hour'] = $returnData['fifth_hour'];
                    $tableData[$tblIndex][$lineIndex]['fifth_eff'] = $returnData['fifth_eff'];
                    $tableData[$tblIndex][$lineIndex]['sixth_hour'] = $returnData['sixth_hour'];
                    $tableData[$tblIndex][$lineIndex]['six_eff'] = $returnData['six_eff'];
                    $tableData[$tblIndex][$lineIndex]['seventh_hour'] = $returnData['seventh_hour'];
                    $tableData[$tblIndex][$lineIndex]['seven_eff'] = $returnData['seven_eff'];
                    $tableData[$tblIndex][$lineIndex]['eight_hour'] = $returnData['eight_hour'];
                    $tableData[$tblIndex][$lineIndex]['eight_eff'] = $returnData['eight_eff'];
                    $tableData[$tblIndex][$lineIndex]['nine_hour'] = $returnData['nine_hour'];
                    $tableData[$tblIndex][$lineIndex]['nine_eff'] = $returnData['nine_eff'];
                    $tableData[$tblIndex][$lineIndex]['ten_hour'] = $returnData['ten_hour'];
                    $tableData[$tblIndex][$lineIndex]['ten_eff'] = $returnData['ten_eff'];
                    $tableData[$tblIndex][$lineIndex]['ele_hour'] = $returnData['ele_hour'];
                    $tableData[$tblIndex][$lineIndex]['ele_eff'] = $returnData['ele_eff'];
                    $tableData[$tblIndex][$lineIndex]['twe_hour'] = $returnData['twe_hour'];
                    $tableData[$tblIndex][$lineIndex]['twe_eff'] = $returnData['twe_eff'];
                    $tableData[$tblIndex][$lineIndex]['thirteen_hour'] = $returnData['thirteen_hour'];
                    $tableData[$tblIndex][$lineIndex]['thirteen_eff'] = $returnData['thirteen_eff'];

                    $tableData[$tblIndex][$lineIndex]['fourteen_hour'] = $returnData['fourteen_hour'];
                    $tableData[$tblIndex][$lineIndex]['fourteen_eff'] = $returnData['fourteen_eff'];

                    $tableData[$tblIndex][$lineIndex]['fifteen_hour'] = $returnData['fifteen_hour'];
                    $tableData[$tblIndex][$lineIndex]['fifteen_eff'] = $returnData['fifteen_eff'];

                    $tableData[$tblIndex][$lineIndex]['average_eff'] = $returnData['average_eff'];
                    $tableData[$tblIndex][$lineIndex]['total_hour'] = $returnData['total_hour'];
                }
            }

            $line_name = [];
            foreach ($generalInfoData as $item) {
                array_push($line_name, $item['line_name']);
            }
            //return $line_name;

            $dhus = [];
            if (count($tableData) > 0) {
                foreach ($tableData as $tblIndex => $tableVal) {
                    if (count($tableVal) > 0) {
                        foreach ($tableVal as $lineIndex => $lineData) {
                            array_push(
                                $dhus,
                                $lineData['dhu']
                            );
                        }
                    }
                }
            }
            //return  $dhus;
            $defect_codes = [];
            if (count($tableData) > 0) {
                foreach ($tableData as $tblIndex => $tableVal) {
                    if (count($tableVal) > 0) {
                        foreach ($tableVal as $lineIndex => $lineData) {
                            array_push(
                                $defect_codes,
                                $lineData['defect_code_count'],
                            );
                        }
                    }
                }
            }
           // return $defect_codes;

            //  return $tableData;
            return view('report.qc_report.qc_report_view', compact('tableData', 'allFloor', 'from', 'to', 'diff_days','defect_codes','dhus','line_name'));
        } catch (\Throwable $th) {
            Session::flash('message_validation', 'Failed to Load Report!');
            return Redirect::back();
        }
    }



    public function prprAverage_eff($floor_id, $line_id, $from_search, $to_search)
    {
        $returnData = [];
        $general_data = GeneralInfo::where('floor_id', $floor_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->where('line_id', $line_id)->first();
        $smv = $general_data->smv ?? 0;
        $man_power = $general_data->man_power ?? 1;
        //return $returnData;
        $returnData['first_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '08:00')
            ->whereTime('created_at', '<', '09:00')
            ->get()
            ->count();
        $returnData['first_eff'] = ((($returnData['first_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['sec_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '09:00')
            ->whereTime('created_at', '<', '10:00')
            ->get()
            ->count();
        $returnData['sec_eff'] = ((($returnData['sec_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['third_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '10:00')
            ->whereTime('created_at', '<', '11:00')
            ->get()
            ->count();
        $returnData['third_eff'] = ((($returnData['third_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['fourth_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '11:00')
            ->whereTime('created_at', '<', '12:00')
            ->get()
            ->count();
        $returnData['fourth_eff'] = ((($returnData['fourth_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['fifth_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '12:00')
            ->whereTime('created_at', '<', '13:00')
            ->get()
            ->count();
        $returnData['fifth_eff'] = ((($returnData['fifth_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['sixth_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '13:00')
            ->whereTime('created_at', '<', '14:00')
            ->get()
            ->count();
        $returnData['six_eff'] = ((($returnData['sixth_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['seventh_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '14:00')
            ->whereTime('created_at', '<', '15:00')
            ->get()
            ->count();
        $returnData['seven_eff'] = ((($returnData['seventh_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['eight_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '15:00')
            ->whereTime('created_at', '<', '16:00')
            ->get()
            ->count();
        $returnData['eight_eff'] = ((($returnData['eight_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['nine_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '16:00')
            ->whereTime('created_at', '<', '17:00')
            ->get()
            ->count();
        $returnData['nine_eff'] = ((($returnData['nine_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['ten_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '17:00')
            ->whereTime('created_at', '<', '18:00')
            ->get()
            ->count();
        $returnData['ten_eff'] = ((($returnData['ten_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['ele_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '18:00')
            ->whereTime('created_at', '<', '19:00')
            ->get()
            ->count();
        $returnData['ele_eff'] = ((($returnData['ele_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['twe_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '19:00')
            ->whereTime('created_at', '<', '20:00')
            ->get()
            ->count();
        $returnData['twe_eff'] = ((($returnData['twe_hour'] * $smv) / ($man_power * 60)) * 100);

        $returnData['thirteen_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '20:00')
            ->whereTime('created_at', '<', '21:00')
            ->get()
            ->count();
        $returnData['thirteen_eff'] = ((($returnData['thirteen_hour'] * $smv) / ($man_power * 60)) * 100);

        $returnData['fourteen_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '21:00')
            ->whereTime('created_at', '<', '22:00')
            ->get()
            ->count();
        $returnData['fourteen_eff'] = ((($returnData['fourteen_hour'] * $smv) / ($man_power * 60)) * 100);

        $returnData['fifteen_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereBetween('created_at', [new Carbon($from_search), new Carbon($to_search)])
            ->whereTime('created_at', '>=', '22:00')
            ->whereTime('created_at', '<', '23:00')
            ->get()
            ->count();
        $returnData['fifteen_eff'] = ((($returnData['fifteen_hour'] * $smv) / ($man_power * 60)) * 100);

        /*Dynamic Effici*/
        $average_no = 0;
        if ($returnData['first_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['sec_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['third_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['fourth_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['fifth_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['six_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['seven_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['eight_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['nine_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['ten_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['ele_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['twe_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['thirteen_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['fourteen_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['fifteen_eff'] > 0) {
            ++$average_no;
        }

        if ($average_no != 0) {
            $returnData['average_eff'] = (($returnData['first_eff'] + $returnData['sec_eff'] + $returnData['third_eff'] + $returnData['fourth_eff'] + $returnData['fifth_eff'] + $returnData['six_eff'] + $returnData['seven_eff'] + $returnData['eight_eff'] + $returnData['nine_eff'] + $returnData['ten_eff'] + $returnData['ele_eff'] + $returnData['twe_eff']
                + $returnData['thirteen_eff'] + $returnData['fourteen_eff'] + $returnData['fifteen_eff']) / $average_no);
        } else {
            $returnData['average_eff'] = 0;
        }

        $returnData['total_hour'] = $returnData['first_hour'] + $returnData['sec_hour'] + $returnData['third_hour'] + $returnData['fourth_hour'] + $returnData['fifth_hour'] + $returnData['sixth_hour'] + $returnData['seventh_hour'] + $returnData['eight_hour'] + $returnData['nine_hour'] + $returnData['ten_hour'] + $returnData['ele_hour'] + $returnData['twe_hour'] + $returnData['thirteen_hour'] + $returnData['fourteen_hour'] + $returnData['fifteen_hour'];
        return $returnData;
    }
}
