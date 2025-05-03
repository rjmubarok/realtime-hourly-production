<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\DefectCode;
use App\Models\QualityCheck;
use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\GeneralInfo;
use App\Models\Line;
use App\Models\MC;
use App\Models\Operator;
use App\Models\Process;
use App\Models\TenCard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QualitycheckController extends Controller
{
    public function index()
    {

        $tableData = QualityCheck::orderBy('id', 'DESC')->with('floor', 'line')->paginate(50);
        // return $tableData;
        return view('form.quality_check_view', compact('tableData'));
    }
    public function quelity_edit($id)
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;

        $buyers = Buyer::whereStatus(1)
            ->get();
        $process_data = Process::whereStatus(1)
            ->get();
        $mc_data = MC::whereStatus(1)
            ->get();
        $defect_data = DefectCode::whereStatus(1)
            ->get();
        $card_data = TenCard::whereStatus(1)
            ->get();
        $operators = Operator::whereStatus(1)->get();
        $data = QualityCheck::find($id);
        //return $data;
        return view('form.qc_edit', compact('data', 'buyers', 'process_data', 'mc_data', 'defect_data', 'card_data', 'operators'));
    }
    public function product_uptade(Request $request,  $id)
    {


        $this->validate($request, [
            // 'po' => 'required'

        ]);
        if ($request->process == 'OTHERS') {
            $process = $request->process_text;
        } else {
            $process = $request->process;
        }

        if ($request->output == "2") {
            $outputs = ['1', '2'];
        } else {
            $outputs = [$request->output];
        }

        foreach ($outputs as $key => $output) {

            $data = [

                'buyer_id' => $request->buyer_id,
                'output' => $output,
                'size' => $request->size == 'OTHERS' ? $request->other_size : $request->size,
                'color' => strtolower($request->color),
                'po' => $request->po,
                'process' => $process,
                'style' => strtolower($request->style),
                'mc' => $request->mc == 'OTHERS' ? $request->mc_text : $request->mc,
                'defect_quantity' => $request->defect_quantity,
                'defect_code' => $request->defect_code == 'OTHERS' ? $request->defect_code_text : $request->defect_code,
                'op_name' => $request->op_name == 'OTHERS' ? $request->op_name_text : $request->op_name,
                'ten_cards' => $request->ten_cards == 'OTHERS' ? $request->ten_cards_text : $request->ten_cards,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // return $data;

        QualityCheck::where('id', $id)->update($data);
        return redirect()->back()->with(['success' => 'Successfully update!']);
    }

    public function quality_check_view(){

        $allFloor = Floor::all()->pluck('name', 'id');
        $generalInfoData = GeneralInfo::leftJoin('lines', 'general_infos.line_id', '=', 'lines.id')
            ->leftJoin('floors', 'general_infos.floor_id', '=', 'floors.id')
            ->whereDate('general_infos.created_at', Carbon::today())->orderBy('line_id', 'ASC')
            ->get([
                'general_infos.id',
                'general_infos.floor_id',
                'general_infos.line_id',
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

        $tableData = [];
        foreach ($generalInfoData as $datum) {
            $tableData[$datum['floor_id']][] = $datum;
        }

        foreach ($tableData as $tblIndex => $singleTblData) {

            foreach ($singleTblData as $lineIndex => $lineData) {
                $tableData[$tblIndex][$lineIndex]['qc_passed'] = QualityCheck::where('output', 1)
                    ->whereDate('created_at', Carbon::today())
                    ->where('floor_id', $lineData['floor_id'])
                    ->where('line_id', $lineData['line_id'])
                    ->get()->count();
                $tableData[$tblIndex][$lineIndex]['rectified'] = QualityCheck::where('output', 2)
                    ->whereDate('created_at', Carbon::today())
                    ->where('floor_id', $lineData['floor_id'])
                    ->where('line_id', $lineData['line_id'])
                    ->get()->count();
                $tableData[$tblIndex][$lineIndex]['reject'] = QualityCheck::where('output', 3)
                    ->whereDate('created_at', Carbon::today())
                    ->where('floor_id', $lineData['floor_id'])
                    ->where('line_id', $lineData['line_id'])
                    ->get()->count();
                $tableData[$tblIndex][$lineIndex]['defected'] = QualityCheck::where('output', 4)
                    ->whereDate('created_at', Carbon::today())
                    ->where('floor_id', $lineData['floor_id'])
                    ->where('line_id', $lineData['line_id'])
                    ->get()->count();

                $tableData[$tblIndex][$lineIndex]['total_check'] = QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->get()
                    ->count();
                //  return $tableData[$tblIndex][$lineIndex]['total_check'] ;
                $tableData[$tblIndex][$lineIndex]['total_defect'] = QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->sum('defect_quantity');
                //return $tableData[$tblIndex][$lineIndex]['total_defect'];
                $tableData[$tblIndex][$lineIndex]['defect_code'] = (QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->select(DB::raw('group_concat(defect_code) as defect_code'))->first())->defect_code;

                if ($tableData[$tblIndex][$lineIndex]['total_check'] != 0) {
                    $tableData[$tblIndex][$lineIndex]['dhu'] = ($tableData[$tblIndex][$lineIndex]['total_defect'] / $tableData[$tblIndex][$lineIndex]['total_check']) * 100;
                } else {
                    $tableData[$tblIndex][$lineIndex]['dhu'] = 0;
                }
                //  return   $tableData[$tblIndex][$lineIndex]['dhu'] ;

                $returnData = $this->prprAverage_eff($lineData['floor_id'], $lineData['line_id']);
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


        return view('quality.quality_check_view', compact('tableData', 'allFloor'));


    }
    public function prprAverage_eff($floor_id, $line_id)
    {
        $returnData = [];
        $general_data = GeneralInfo::where('floor_id', $floor_id)->where('line_id', $line_id)->whereDate('created_at', Carbon::today())->first();
        $smv = $general_data->smv ?? 0;
        $man_power = $general_data->man_power ?? 1;

        $returnData['first_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '08:00')
            ->whereTime('created_at', '<', '09:00')
            ->get()
            ->count();
        $returnData['first_eff'] = ((($returnData['first_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['sec_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '09:00')
            ->whereTime('created_at', '<', '10:00')
            ->get()
            ->count();
        $returnData['sec_eff'] = ((($returnData['sec_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['third_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '10:00')
            ->whereTime('created_at', '<', '11:00')
            ->get()
            ->count();
        $returnData['third_eff'] = ((($returnData['third_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['fourth_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '11:00')
            ->whereTime('created_at', '<', '12:00')
            ->get()
            ->count();
        $returnData['fourth_eff'] = ((($returnData['fourth_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['fifth_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '12:00')
            ->whereTime('created_at', '<', '13:00')
            ->get()
            ->count();
        $returnData['fifth_eff'] = ((($returnData['fifth_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['sixth_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '13:00')
            ->whereTime('created_at', '<', '14:00')
            ->get()
            ->count();
        $returnData['six_eff'] = ((($returnData['sixth_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['seventh_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '14:00')
            ->whereTime('created_at', '<', '15:00')
            ->get()
            ->count();
        $returnData['seven_eff'] = ((($returnData['seventh_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['eight_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '15:00')
            ->whereTime('created_at', '<', '16:00')
            ->get()
            ->count();
        $returnData['eight_eff'] = ((($returnData['eight_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['nine_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '16:00')
            ->whereTime('created_at', '<', '17:00')
            ->get()
            ->count();
        $returnData['nine_eff'] = ((($returnData['nine_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['ten_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '17:00')
            ->whereTime('created_at', '<', '18:00')
            ->get()
            ->count();
        $returnData['ten_eff'] = ((($returnData['ten_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['ele_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '18:00')
            ->whereTime('created_at', '<', '19:00')
            ->get()
            ->count();
        $returnData['ele_eff'] = ((($returnData['ele_hour'] * $smv) / ($man_power * 60)) * 100);
        $returnData['twe_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '19:00')
            ->whereTime('created_at', '<', '20:00')
            ->get()
            ->count();
        $returnData['twe_eff'] = ((($returnData['twe_hour'] * $smv) / ($man_power * 60)) * 100);

        $returnData['thirteen_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '20:00')
            ->whereTime('created_at', '<', '21:00')
            ->get()
            ->count();
        $returnData['thirteen_eff'] = ((($returnData['thirteen_hour'] * $smv) / ($man_power * 60)) * 100);

        $returnData['fourteen_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '21:00')
            ->whereTime('created_at', '<', '22:00')
            ->get()
            ->count();
        $returnData['fourteen_eff'] = ((($returnData['fourteen_hour'] * $smv) / ($man_power * 60)) * 100);

        $returnData['fifteen_hour'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
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
