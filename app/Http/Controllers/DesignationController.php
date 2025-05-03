<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user=Auth::user()->user_type==1;
       if($user){
      $designations=  Designation::orderBy('id','ASC')->get();
      return view('setting.designation.index',compact('designations'));
       }else{
        return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user()->user_type==1;
       if($user){
      return view('setting.designation.create');
       }else{
        return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);
            $data = [
                'name' => $request->name,
            ];
            Designation::create($data);
            return redirect()->route('designation')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Designation::find($id);
        // return $data;
         return view('setting.designation.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);

            $data = [
                'name' => $request->name,

            ];
            Designation::where('id', $id)->update($data);
            return redirect()->route('designation')->with(['success' => 'Successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        //
    }

    public function des_status($id){

        try {
            $find_existing_data = Designation::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];
            Designation::where('id', $id)->update($update_data);

            if ($find_existing_data->status == 0) {
                return redirect()->route('designation')->with(['success' => 'Successfully Active!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully InActive!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }

}
}
