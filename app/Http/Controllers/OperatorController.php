<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Line;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $operators = Operator::with('floor', 'line')
            ->get();

        return view('setting.operator.index', compact('operators'));
    }
    public function oparator_create()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.operator.create', compact('floors', 'lines'));
    }
    public function operator_store(Request $request)
    {
        //return $request->all();

            $this->validate($request, [
                'name' => 'required'
            ]);
            $data = [
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
                'salary' => $request->salary,
            ];
           $operator= Operator::create($data);
           if($operator){
            return redirect()->route('operator_list')->with(['success' => 'Successfully Created!']);
           }else{
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
           }
    }
    public function operator_status($id)
    {
        try {
            $find_existing_data = Operator::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];
            Operator::where('id', $id)->update($update_data);

            if ($find_existing_data->status == 0) {
                return redirect()->route('operator_list')->with(['success' => 'Successfully InActive!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully Active!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }
}
