<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        $floors= Floor::whereStatus(1)->get();
        $floor_admins= Floor::orderBy('id','ASC')->get();
      //return  $floor_admins;
        return view('setting.floor.index', compact('floors','floor_admins'));
    }

    public function floor_add()
    {
        return view('setting.floor.create');
    }

    public function floor_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);
            $data = [
                'name' => $request->name,
            ];
            Floor::create($data);
            return redirect()->route('floorList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }

    }

    public function floor_status($id){

            try {
                $find_existing_data = Floor::where('id', $id)->first();

                if ($find_existing_data->status == 0) {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $update_data = [
                    'status' => $status
                ];
                Floor::where('id', $id)->update($update_data);

                if ($find_existing_data->status == 0) {
                    return redirect()->route('floorList')->with(['success' => 'Successfully Active!']);
                } else {
                    return redirect()->back()->with(['success' => 'Successfully InActive!']);
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
            }

    }

    public function floor_edit($id){
        $data = Floor::find($id);
       // return $data;
        return view('setting.floor.edit',compact('data'));
    }
    public function floor_update(Request $request, $id){
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $data = [
                'name' => $request->name,

            ];
            Floor::where('id', $id)->update($data);
            return redirect()->route('floorList')->with(['success' => 'Successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }
}
