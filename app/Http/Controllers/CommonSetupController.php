<?php

namespace App\Http\Controllers;

use App\Models\DefectCode;
use App\Models\Floor;
use App\Models\Line;
use App\Models\MC;
use App\Models\Process;
use App\Models\TenCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonSetupController extends Controller
{
    public function process_list()
    {
        $datas= Process::with('floor', 'line')->paginate(20);
        return view('setting.process.index', compact('datas'));
    }

    public function process_add()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.process.create', compact('lines', 'floors'));
    }

    public function process_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            Process::create($data);
            return redirect()->route('processList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }
    }

    public function process_edit($id)
    {
        $single_data = Process::where('id', $id)->first();
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.process.edit', compact('single_data', 'floors', 'lines'));
    }

    public function process_update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            Process::where('id',$id)->update($data);
            return redirect()->route('processList')->with(['success' => 'Successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }
    }

    public function process_status($id)
    {



        try {
            $find_existing_data = Process::where('id', $id)->first();
            if ($find_existing_data->status === '0') {
                $status = '1';
            } else {
                $status = '0';
            }
            $update_data = [
                'status' => $status
            ];
            Process::where('id', $id)->update($update_data);

            if ($find_existing_data->status === '0') {
                return redirect()->route('processList')->with(['success' => 'Successfully Update!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully Update!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }

    }
    public function mc_list()
    {
        $datas= MC::with('floor', 'line')->paginate(20);
        return view('setting.mc.index', compact('datas'));
    }

    public function mc_add()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.mc.create', compact('lines', 'floors'));
    }

    public function mc_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            MC::create($data);
            return redirect()->route('mcList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function mc_edit($id)
    {
        $single_data = MC::where('id', $id)->first();
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.mc.edit', compact('single_data', 'floors', 'lines'));
    }

    public function mc_update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            MC::where('id',$id)->update($data);
            return redirect()->route('mcList')->with(['success' => 'Successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function mc_status($id)
    {
        try {
            $find_existing_data = MC::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];
            MC::where('id', $id)->update($update_data);

            if ($find_existing_data->status == 0) {
                return redirect()->route('mcList')->with(['success' => 'Successfully InActive!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully Active!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }

    }
    public function defect_list()
    {
        $datas= DefectCode::with('floor', 'line')->paginate(20);
        return view('setting.defect.index', compact('datas'));
    }

    public function defect_add()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.defect.create', compact('lines', 'floors'));
    }

    public function defect_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            DefectCode::create($data);
            return redirect()->route('defectList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function defect_edit($id)
    {
        $single_data = DefectCode::where('id', $id)->first();
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.defect.edit', compact('single_data', 'floors', 'lines'));
    }

    public function defect_update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            DefectCode::where('id',$id)->update($data);
            return redirect()->route('defectList')->with(['success' => 'Successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function defect_status($id)
    {
        try {
            $find_existing_data = DefectCode::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];
            DefectCode::where('id', $id)->update($update_data);

            if ($find_existing_data->status == 0) {
                return redirect()->route('defectList')->with(['success' => 'Successfully InActive!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully Active!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }

    }
    public function tenCard_list()
    {
        $datas= TenCard::with('floor', 'line')->paginate(20);
        return view('setting.tenCard.index', compact('datas'));
    }

    public function tenCard_add()
    {
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.tenCard.create', compact('lines', 'floors'));
    }

    public function tenCard_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            TenCard::create($data);
            return redirect()->route('tenCardList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function tenCard_edit($id)
    {
        $single_data = TenCard::where('id', $id)->first();
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.tenCard.edit', compact('single_data', 'floors', 'lines'));
    }

    public function tenCard_update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            TenCard::where('id',$id)->update($data);
            return redirect()->route('tenCardList')->with(['success' => 'Successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function tenCard_status($id)
    {
        try {
            $find_existing_data = TenCard::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];

            TenCard::where('id', $id)->update($update_data);
            if ($find_existing_data->status == 0) {
                return redirect()->route('tenCardList')->with(['success' => 'Successfully Active!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully Inactive!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }
    }
}
