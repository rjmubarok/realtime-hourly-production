<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GeneralInfoController extends Controller
{
    public function general_add()
    {
        return view('form.general_form');
    }

    public function general_store(Request $request)
    {
        //$data = Carbon::now();
        $user_id = Auth::user()->id;
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;
        $Exesting_data =  GeneralInfo::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->get();

        $this->validate($request, [
            'today_target' => 'required',
            'total_target' => 'required',
            'total_production' => 'required',
            'finishing_receive' => 'required',
            'man_power' => 'required',
            'buyer_name' => 'required',
            'smv' => 'required',
        ]);
        $data = [
            'created_by' => $user_id,
            'floor_id' => $floor_id,
            'line_id' => $line_id,
            'today_target' => $request->today_target,
            'total_target' => $request->total_target,
            'total_production' => $request->total_production,
            'finishing_receive' => $request->finishing_receive,
            'man_power' => $request->man_power,
            'buyer_name' => $request->buyer_name,
            'style' => $request->style,
            'run_day' => $request->run_day,
            'order_qty' => $request->order_qty,
            'color' => $request->color,
            'po' => $request->po,
            'smv' => $request->smv,
            'comments' => $request->comments,
        ];


        if (count($Exesting_data)>0) {
            return redirect()->back()->with('error', 'You already Added Today!');
        }else{
            $success=GeneralInfo::create($data);
            if($success){
                return redirect()->back()->with('success', 'Successfully Created!');
            }

        }



    }

    public function general_view()
    {
        $floor_id = Auth::user()->floor_id;
        $line_id = Auth::user()->line_id;

        $data = GeneralInfo::whereStatus(1)
            ->where('floor_id', $floor_id)
            ->where('line_id', $line_id)
            ->whereDate('created_at', Carbon::today())
            ->get();
        return view('form.general_view', compact('data'));
    }

    public function edit($id)
    {
        $single_data = GeneralInfo::where('id', $id)->first();
        return view('form.generalinfo_edit', compact('single_data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'today_target' => 'required',
                'total_target' => 'required',
                'total_production' => 'required',
                'finishing_receive' => 'required',
                'man_power' => 'required',
                'buyer_name' => 'required',
                'smv' => 'required'
            ]);
            $data = [
                'created_by' => Auth::user()->id,
                'today_target' => $request->today_target,
                'total_target' => $request->total_target,
                'total_production' => $request->total_production,
                'finishing_receive' => $request->finishing_receive,
                'man_power' => $request->man_power,
                'buyer_name' => $request->buyer_name,
                'style' => $request->style,
                'run_day' => $request->run_day,
                'order_qty' => $request->order_qty,
                'color' => $request->color,
                'po' => $request->po,
                'smv' => $request->smv,
                'comments' => $request->comments,
            ];
            GeneralInfo::where('id', $id)->update($data);
            if(Auth::user()->user_type=='1'){
                return redirect()->route('general_info')->with(['success' => 'Successfully Updated!']);

            }else{
                return redirect()->route('generalFormView')->with(['success' => 'Successfully Updated!']);

            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }


    public function info_admin_side(){
        if(auth()->user()->user_type=='1'){
            $data= GeneralInfo::orderBy('id','DESC')->paginate(50);;
            return view('form.general_view_for_admin', compact('data'));

        }
    }
}
