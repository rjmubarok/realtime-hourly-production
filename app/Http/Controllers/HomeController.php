<?php

namespace App\Http\Controllers;

use App\Models\DefectCode;
use App\Models\Floor;
use App\Models\GeneralInfo;
use App\Models\Line;
use App\Models\QualityCheck;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    public function index()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;

        $general_data = GeneralInfo::where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        $smv = $general_data->smv ?? 0;
        $man_power = $general_data->man_power ?? 1;


        $general_target= GeneralInfo::where('floor_id', $floor_id)
        ->where('line_id', $line_id)
        ->whereDate('created_at', Carbon::today())
        ->first();

    $today_target = $general_target->today_target ?? 0;
   // return $today_target;
     
        $ramadan1 = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '06:00')
            ->whereTime('created_at', '<', '07:00')
            ->get()
            ->count();
       $ramadan1_eff = ((($ramadan1 * $smv) / ($man_power * 60)) * 100);
       $ramadan2 = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '07:00')
            ->whereTime('created_at', '<', '08:00')
            ->get()
            ->count();
       $ramadan2_eff = ((($ramadan2 * $smv) / ($man_power * 60)) * 100);



        $first_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '08:00')
            ->whereTime('created_at', '<', '09:00')
            ->get()
            ->count();
        $first_eff = ((($first_hour * $smv) / ($man_power * 60)) * 100);
        $sec_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '09:00')
            ->whereTime('created_at', '<', '10:00')
            ->get()
            ->count();
        $sec_eff = ((($sec_hour * $smv) / ($man_power * 60)) * 100);
        $third_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '10:00')
            ->whereTime('created_at', '<', '11:00')
            ->get()
            ->count();
          //  return $man_power;
        $third_eff = ((($third_hour * $smv) / ($man_power * 60)) * 100);
        $fourth_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '11:00')
            ->whereTime('created_at', '<', '12:00')
            ->get()
            ->count();
        $fourth_eff = ((($fourth_hour * $smv) / ($man_power * 60)) * 100);
        $fifth_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '12:00')
            ->whereTime('created_at', '<', '13:00')
            ->get()
            ->count();
        $fifth_eff = ((($fifth_hour * $smv) / ($man_power * 60)) * 100);
        $sixth_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '13:00')
            ->whereTime('created_at', '<', '14:00')
            ->get()
            ->count();
        $six_eff = ((($sixth_hour * $smv) / ($man_power * 60)) * 100);
        $seventh_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '14:00')
            ->whereTime('created_at', '<', '15:00')
            ->get()
            ->count();
        $seven_eff = ((($seventh_hour * $smv) / ($man_power * 60)) * 100);
        $eight_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '15:00')
            ->whereTime('created_at', '<', '16:00')
            ->get()
            ->count();
        $eight_eff = ((($eight_hour * $smv) / ($man_power * 60)) * 100);
        $nine_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '16:00')
            ->whereTime('created_at', '<', '17:00')
            ->get()
            ->count();
        $nine_eff = ((($nine_hour * $smv) / ($man_power * 60)) * 100);
        $ten_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '17:00')
            ->whereTime('created_at', '<', '18:00')
            ->get()
            ->count();
        $ten_eff = ((($ten_hour * $smv) / ($man_power * 60)) * 100);
        $ele_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '18:00')
            ->whereTime('created_at', '<', '19:00')
            ->get()
            ->count();
        $ele_eff = ((($ele_hour * $smv) / ($man_power * 60)) * 100);
        $twe_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '19:00')
            ->whereTime('created_at', '<', '20:00')
            ->get()
            ->count();
        $twe_eff = ((($twe_hour * $smv) / ($man_power * 60)) * 100);

        $thirteen_hour = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '20:00')
            ->whereTime('created_at', '<', '21:00')
            ->get()
            ->count();
        $thirteen_eff = ((($thirteen_hour * $smv) / ($man_power * 60)) * 100);

        /*Dynamic Effici*/
        $average_no = 0;
         if ($ramadan1_eff > 0) {
            ++$average_no;
        }
        if ($ramadan2_eff > 0) {
            ++$average_no;
        }

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
            $average_eff = (($ramadan1_eff+$ramadan2_eff+$first_eff + $sec_eff + $third_eff + $fourth_eff + $fifth_eff + $six_eff + $seven_eff + $eight_eff + $nine_eff + $ten_eff + $ele_eff + $twe_eff
                + $thirteen_eff) / $average_no);
        } else {
            $average_eff = 0;
        }

        $data = GeneralInfo::whereStatus(1)
            ->whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->get();
        $user = auth()->user()->user_type;
        $datas = QualityCheck::whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('output', 4)
            ->with('user')
            ->paginate(50);
      //  return $datas;
        $total_check = QualityCheck::whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->get()
            ->count();
        $total_defect = QualityCheck::whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->sum('defect_quantity');

        if ($total_check != 0) {
            $dhu = ($total_defect / $total_check) * 100;
        } else {
            $dhu = 0;
        }


        if ($user == 1) {
            $qc_passed = QualityCheck::where('output', 1)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $rectified = QualityCheck::where('output', 2)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $reject = QualityCheck::where('output', 3)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $defected = QualityCheck::where('output', 4)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
        } elseif ($user == 3) {
            /**/
            $general_data = GeneralInfo::where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->first();
            $smv = $general_data->smv ?? 0;

            $man_power = $general_data->man_power ?? 1;
           //   return $man_power;
                        $ramadan1 = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '06:00')
            ->whereTime('created_at', '<', '07:00')
            ->get()
            ->count();
$ramadan1_eff = ((($ramadan1 * $smv) / ($man_power * 60)) * 100);
$ramadan2 = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '07:00')
            ->whereTime('created_at', '<', '08:00')
            ->get()
            ->count();
$ramadan2_eff = ((($ramadan2 * $smv) / ($man_power * 60)) * 100);

            $first_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '08:00')
                ->whereTime('created_at', '<', '09:00')
                ->get()
                ->count();
            $first_eff = ((($first_hour * $smv) / ($man_power * 60)) * 100);
            $sec_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '09:00')
                ->whereTime('created_at', '<', '10:00')
                ->get()
                ->count();
            $sec_eff = ((($sec_hour * $smv) / ($man_power * 60)) * 100);
            $third_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '10:00')
                ->whereTime('created_at', '<', '11:00')
                ->get()
                ->count();
              //  return $third_hour;
            $third_eff = ((($third_hour * $smv) / ($man_power * 60)) * 100);
            $fourth_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '11:00')
                ->whereTime('created_at', '<', '12:00')
                ->get()
                ->count();
            $fourth_eff = ((($fourth_hour * $smv) / ($man_power * 60)) * 100);
            $fifth_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '12:00')
                ->whereTime('created_at', '<', '13:00')
                ->get()
                ->count();
            $fifth_eff = ((($fifth_hour * $smv) / ($man_power * 60)) * 100);
            $sixth_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '13:00')
                ->whereTime('created_at', '<', '14:00')
                ->get()
                ->count();
            $six_eff = ((($sixth_hour * $smv) / ($man_power * 60)) * 100);
            $seventh_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '14:00')
                ->whereTime('created_at', '<', '15:00')
                ->get()
                ->count();
            $seven_eff = ((($seventh_hour * $smv) / ($man_power * 60)) * 100);
            $eight_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '15:00')
                ->whereTime('created_at', '<', '16:00')
                ->get()
                ->count();
            $eight_eff = ((($eight_hour * $smv) / ($man_power * 60)) * 100);
            $nine_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '16:00')
                ->whereTime('created_at', '<', '17:00')
                ->get()
                ->count();
            $nine_eff = ((($nine_hour * $smv) / ($man_power * 60)) * 100);
            $ten_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '17:00')
                ->whereTime('created_at', '<', '18:00')
                ->get()
                ->count();
            $ten_eff = ((($ten_hour * $smv) / ($man_power * 60)) * 100);
            $ele_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '18:00')
                ->whereTime('created_at', '<', '19:00')
                ->get()
                ->count();
            $ele_eff = ((($ele_hour * $smv) / ($man_power * 60)) * 100);
            $twe_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '19:00')
                ->whereTime('created_at', '<', '20:00')
                ->get()
                ->count();
            $twe_eff = ((($twe_hour * $smv) / ($man_power * 60)) * 100);

            $thirteen_hour = QualityCheck::where('output', 1)
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->whereDate('created_at', Carbon::today())
                ->whereTime('created_at', '>=', '20:00')
                ->whereTime('created_at', '<', '21:00')
                ->get()
                ->count();
            $thirteen_eff = ((($thirteen_hour * $smv) / ($man_power * 60)) * 100);

            /*Dynamic Effici*/
            $average_no = 0;
                 if ($ramadan1_eff > 0) {
                 ++$average_no;
               }
             if ($ramadan2_eff > 0) {
               ++$average_no;
             }

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
                $average_eff = (($ramadan1_eff+$ramadan2_eff+$first_eff + $sec_eff + $third_eff + $fourth_eff + $fifth_eff + $six_eff + $seven_eff + $eight_eff + $nine_eff + $ten_eff + $ele_eff + $twe_eff
                    + $thirteen_eff) / $average_no);
            } else {
                $average_eff = 0;
            }

            $data = GeneralInfo::whereStatus(1)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get();
            $user = auth()->user()->user_type;
            $datas = QualityCheck::whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('output', 4)
            ->with('user')
            ->latest()
            ->paginate(50);

            $total_check = QualityCheck::whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $total_defect = QualityCheck::whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->sum('defect_quantity');

            if ($total_check != 0) {
                $dhu = ($total_defect / $total_check) * 100;
            } else {
                $dhu = 0;
            }

            /*QC Passed Data*/
            $qc_passed = QualityCheck::where('output', 1)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $rectified = QualityCheck::where('output', 2)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $reject = QualityCheck::where('output', 3)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $defected = QualityCheck::where('output', 4)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
        } else {
            $qc_passed = QualityCheck::where('output', 1)
                ->where('created_by', Auth::user()->id)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $rectified = QualityCheck::where('output', 2)
                ->where('created_by', Auth::user()->id)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $reject = QualityCheck::where('output', 3)
                ->where('created_by', Auth::user()->id)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
            $defected = QualityCheck::where('output', 4)
                ->where('created_by', Auth::user()->id)
                ->whereDate('created_at', Carbon::today())
                ->where('floor_id', $floor_id)
                ->where('line_id', $line_id)
                ->get()
                ->count();
        }
        $total_check = QualityCheck::whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->get()
            ->count();
        $total_defect = QualityCheck::whereDate('created_at', Carbon::today())
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->sum('defect_quantity');

        if ($total_check != 0) {
            $dhu = ($total_defect / $total_check) * 100;
        } else {
            $dhu = 0;
        }


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

        $line_name = [];
        foreach ($generalInfoData as $item) {
            array_push($line_name, $item['line_name']);
        }
        //return $line_name;
        $tableData = [];

        foreach ($generalInfoData as $datum) {
            $tableData[$datum['floor_id']][] = $datum;
        }

        foreach ($tableData as $tblIndex => $singleTblData) {

            // return( $singleTblData);
            foreach ($singleTblData as $lineIndex => $lineData) {
                // return $lineData;
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
                $defect_qty = QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->sum('defect_quantity');
                //return $defect_qty;
                $tableData[$tblIndex][$lineIndex]['defect_code'] = (QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->where('output', 4))
                    ->get()
                    ->count();

                $tableData[$tblIndex][$lineIndex]['rejects'] = (QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->where('output', 3))
                    ->get()
                    ->count();

              //  return $tableData[$tblIndex][$lineIndex]['rejects'] ;


                if ($tableData[$tblIndex][$lineIndex]['total_check'] != 0) {
                    $tableData[$tblIndex][$lineIndex]['dhu'] = ($tableData[$tblIndex][$lineIndex]['total_defect'] / $tableData[$tblIndex][$lineIndex]['total_check']) * 100;
                } else {
                    $tableData[$tblIndex][$lineIndex]['dhu'] = 0;
                }
                // return $tableData[$tblIndex][$lineIndex]['dhu'];
            }
        }
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
        $defect_code = [];
        if (count($tableData) > 0) {
            foreach ($tableData as $tblIndex => $tableVal) {
                if (count($tableVal) > 0) {
                    foreach ($tableVal as $lineIndex => $lineData) {
                        array_push(
                            $defect_code,
                            $lineData['defect_code'],
                        );
                    }
                }
            }
        }
        $rejects = [];
        if (count($tableData) > 0) {
            foreach ($tableData as $tblIndex => $tableVal) {
                if (count($tableVal) > 0) {
                    foreach ($tableVal as $lineIndex => $lineData) {
                        array_push(
                            $rejects,
                            $lineData['rejects'],
                        );
                    }
                }
            }
        }


      //   return $defect_code;


        return view('home.index', compact(
            'datas',
            'qc_passed',
            'rectified',
            'reject',
            'defected',
            'data',
            'total_check',
            'total_defect',
            'ramadan1',
            'ramadan2',
            'first_hour',
            'sec_hour',
            'third_hour',
            'fourth_hour',
            'fifth_hour',
            'sixth_hour',
            'seventh_hour',
            'eight_hour',
            'nine_hour',
            'ten_hour',
            'ele_hour',
            'twe_hour',
            'thirteen_hour',
            'dhu',
             'ramadan1_eff',
             'ramadan2_eff',
            'first_eff',
            'sec_eff',
            'third_eff',
            'fourth_eff',
            'fifth_eff',
            'six_eff',
            'seven_eff',
            'eight_eff',
            'nine_eff',
            'ten_eff',
            'ele_eff',
            'twe_eff',
            'thirteen_eff',
            'average_eff',
            'line_name',
            'tableData',
            'dhus',
            'defect_code',
            'rejects',
            'today_target',

        )); //,
        //'ramadan1_hour',
        //'ramadan2_hour'
    }

    public function login()
    {
        return view('auth.login');
    }

    public function viewSummary()
    {
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
                'lines.id as line_idu',
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
                    $tableData[$tblIndex][$lineIndex]['defect_code_count'] = (QualityCheck::where('floor_id', $lineData['floor_id'])
                    ->whereDate('created_at', Carbon::today())
                    ->where('line_id', $lineData['line_id'])
                    ->where('output', 4))
                    ->get()
                    ->count();
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
                
                $tableData[$tblIndex][$lineIndex]['ramadan1'] = $returnData['ramadan1'];
                $tableData[$tblIndex][$lineIndex]['ramadan1_eff'] = $returnData['ramadan1_eff'];
                $tableData[$tblIndex][$lineIndex]['ramadan2'] = $returnData['ramadan2'];
                $tableData[$tblIndex][$lineIndex]['ramadan2_eff'] = $returnData['ramadan2_eff'];

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
                //return $returnData['average_eff'];

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
    //return $defect_codes;
    $rejects = [];
    if (count($tableData) > 0) {
        foreach ($tableData as $tblIndex => $tableVal) {
            if (count($tableVal) > 0) {
                foreach ($tableVal as $lineIndex => $lineData) {
                    array_push(
                        $rejects,
                        $lineData['reject'],
                    );
                }
            }
        }
    }


        return view('home.viewSummary', compact('tableData', 'allFloor','line_name','defect_codes','rejects','dhus'));
    }

    public function prprAverage_eff($floor_id, $line_id)
    {
        $returnData = [];
        $general_data = GeneralInfo::where('floor_id', $floor_id)
        ->whereDate('created_at', Carbon::today())
        ->where('line_id', $line_id)->first();

        $smv = $general_data->smv ?? 0;
        $man_power = $general_data->man_power ?? 1;

        $returnData['ramadan1'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '06:00')
            ->whereTime('created_at', '<', '07:00')
            ->get()
            ->count();
        $returnData['ramadan1_eff'] = ((($returnData['ramadan1'] * $smv) / ($man_power * 60)) * 100);
         $returnData['ramadan2'] = QualityCheck::where('output', 1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->whereTime('created_at', '>=', '07:00')
            ->whereTime('created_at', '<', '08:00')
            ->get()
            ->count();
        $returnData['ramadan2_eff'] = ((($returnData['ramadan2'] * $smv) / ($man_power * 60)) * 100);

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
        // return  $returnData['third_eff'] ;
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
         if ($returnData['ramadan1_eff'] > 0) {
            ++$average_no;
        }
        if ($returnData['ramadan2_eff'] > 0) {
            ++$average_no;
        }
        
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
            $returnData['average_eff'] = (($returnData['ramadan1_eff'] + $returnData['ramadan2_eff'] + $returnData['first_eff'] + $returnData['sec_eff'] + $returnData['third_eff'] + $returnData['fourth_eff'] + $returnData['fifth_eff'] + $returnData['six_eff'] + $returnData['seven_eff'] + $returnData['eight_eff'] + $returnData['nine_eff'] + $returnData['ten_eff'] + $returnData['ele_eff'] + $returnData['fourteen_eff'] + $returnData['fifteen_eff']) / $average_no);
        } else {
            $returnData['average_eff'] = 0;
        }

        $returnData['total_hour'] = $returnData['ramadan1'] + $returnData['ramadan2'] + $returnData['first_hour'] + $returnData['sec_hour'] + $returnData['third_hour'] + $returnData['fourth_hour'] + $returnData['fifth_hour'] + $returnData['sixth_hour'] + $returnData['seventh_hour'] + $returnData['eight_hour'] + $returnData['nine_hour'] + $returnData['ten_hour'] + $returnData['ele_hour'] + $returnData['twe_hour'] + $returnData['thirteen_hour']+ $returnData['fourteen_eff'] + $returnData['fifteen_eff'] ;
        return $returnData;

    }



    public function redirect_line_dashboard($id)
    {


        $line =  Line::find($id);

        if ($line) {
            Session::flush();
            Auth::logout();

            return redirect()->route('login');
        }else{
            Session::flash('message_validation', 'Failed to Load Report!');
            return Redirect::back();
        }
       // return $line;
    }
}
