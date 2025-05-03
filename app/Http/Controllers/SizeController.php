<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function size_list()
    {
        $sizes=Size::all();
        return view('setting.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function size_add()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        return view('setting.size.create', compact('floors','lines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function size_store(Request $request)
    {



       // return $request->all();
        $request->validate([
            'name' => 'required',
            'line_id' => 'required',
            'floor_id' => 'required',
        ],[
            'name.required'=>'Name Field Is Required ',
            'floor_id.required'=>'Buyer Name Field Is Required ',
            'line_id.required'=>'Line Name Field Is Required ',
        ]);
        $size=new size();
        $size->name=$request->name;
        $size->floor_id=$request->floor_id;
        $size->line_id=$request->line_id;
        $size->user_id=Auth::user()->id;
        $size->save();
        return redirect()->route('sizeList')->with(['success' => 'Successfully Ceated!']);


        // try {
        //     $this->validate($request, [
        //         'name' => 'required',
        //         'line_id' => 'required',
        //         'buyer_id' => 'required',
        //     ],[
        //             'name'=>'Name Field Is Required ',
        //             'buyer_id'=>'Buyer Name Field Is Required ',
        //             'line_id'=>'Line Name Field Is Required ',
        //         ]
        // );
        //     $data = [
        //         'user_id' => Auth::user()->id,
        //         'floor_id' => $request->floor_id,
        //         'line_id' => $request->line_id,
        //         'name' => $request->name,
        //     ];
        //     Size::create($data);
        //     return redirect()->route('sizeList')->with(['success' => 'Successfully Created!']);

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function size_edit( $id)
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();
        $size=  Size::where('id',$id)->first();
        return view('setting.size.edit', compact('size','floors','lines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function size_update(Request $request, $id)
    {
        $size = Size::find($id);
        $size->name = $request->name;
        $size->floor_id = $request->floor_id;
        $size->line_id = $request->line_id;
        $size->user_id=Auth::user()->id;

        $status = $size->update();
        if ($status) {
            return redirect()->route('sizeList')->with(['success' => 'Successfully Updated!']);

        } else {
            return back()->with(['error' =>'Something went Wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function size_Delete($id)
    {
        $size = Size::find($id);
        if ($size) {
            $status = $size->delete();
            if ($status) {
                return back()->with(['success' =>'Successfully deleted']);
            } else {
                return back()->with(['error' =>'Something went Wrong']);
            }
        } else {
            return back()->with(['error' =>'Something went Wrong']);
        }
    }

    public function size_status($id)
    {

        $find_existing_data = Size::where('id', $id)->first();

        if ($find_existing_data->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $update_data = [
            'status' => $status
        ];
        Size::where('id', $id)->update($update_data);

        if ($find_existing_data->status == 0) {
            return back()->with(['success' =>'Successfully Active']);
        } else {
            return back()->with(['success' =>'Successfully Inactive']);
        }
    }
}
