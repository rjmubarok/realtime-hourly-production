<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LineController extends Controller
{
    public function index()
    {
        $lines = Line::whereStatus(1)->with('floor')->get();
        $line_admins= Line::orderBy('id','ASC')->with('floor')->get();
        return view('setting.line.index', compact('lines','line_admins'));
    }

    public function line_add()
    {
        $floors = Floor::whereStatus(1)->get();
        return view('setting.line.create', compact('floors'));
    }

    public function line_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $data = [
                'name' => $request->name,
                'floor_id' => $request->floor_id,
            ];
            Line::create($data);
            return redirect()->route('lineList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }

    }


    public function line_status($id){

        try {
            $find_existing_data = Line::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];
            Line::where('id', $id)->update($update_data);

            if ($find_existing_data->status == 0) {
                return redirect()->route('lineList')->with(['success' => 'Successfully Active!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully InActive!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
}

public function line_edit($id){
    $data = Line::find($id);
    $floors = Floor::all();
    return view('setting.line.edit',compact('data','floors'));
}
public function line_update(Request $request, $id){
    try {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'floor_id' => $request->floor_id,
        ];
        Line::where('id', $id)->update($data);
        return redirect()->route('lineList')->with(['success' => 'Successfully Created!']);

    } catch (\Throwable $th) {
        return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
    }
}


}
