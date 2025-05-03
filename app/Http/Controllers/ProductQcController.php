<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\DefectCode;
use App\Models\MC;
use App\Models\Operator;
use App\Models\Process;
use App\Models\QualityCheck;
use App\Models\Size;
use App\Models\TenCard;
use App\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductQcController extends Controller
{
    public function qc_add()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;

        $buyers = Buyer::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $process_data = Process::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $mc_data = MC::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $defect_data = DefectCode::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $card_data = TenCard::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();

        $operators = Operator::
             where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->latest()
            ->get();
        $sizes = Size::
             where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->where('status', 1)
            ->latest()
            ->get();
       // $sizes=Size::whereStatus('1')->get();
      //  return $sizes;

        return view('form.submit_qc', compact('buyers','sizes', 'process_data', 'mc_data', 'defect_data', 'card_data', 'operators'));
    }

    public function qc_store(Request $request)
    {
        $this->validate($request, [
            'po' => 'required'

        ]);
        //  return $request->all();
        $qty=$request->qc_pass_quantity;
      //return $qty;
        if($request->qc_pass_quantity>0){
            for ($x = 1; $x <= $qty; $x++) {
                  echo "The number is: $x <br>";
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

                        $data[] = [
                            'created_by' => Auth::user()->id,
                            'floor_id' => Auth::user()->floor_id,
                            'line_id' => Auth::user()->line_id,
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
            }
        }else{
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

                    $data[] = [
                        'created_by' => Auth::user()->id,
                        'floor_id' => Auth::user()->floor_id,
                        'line_id' => Auth::user()->line_id,
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
                //  return $data;

        }
        $success=QualityCheck::insert($data);
        if($success){
            return redirect()->back()->with(['success' => 'Successfully Submitted!']);
        }else{
            return redirect()->back()->with(['error' => 'Something wrong']);
        }


    }





}
