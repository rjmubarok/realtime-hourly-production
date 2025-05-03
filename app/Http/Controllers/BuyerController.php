<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Floor;
use App\Models\Line;
use App\Models\QualityCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = Buyer::with('floor', 'line')
            ->get();

        return view('setting.buyer.index', compact('buyers'));
    }

    public function buyer_add()
    {
        $user="user";
        $floors = Floor::whereStatus(1)->get();
        $lines = Line::whereStatus(1)->get();

        return view('setting.buyer.create', compact('floors', 'lines'));
    }

    public function buyer_store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required'
            ]);
            $data = [
                'user_id' => Auth::user()->id,
                'floor_id' => $request->floor_id,
                'line_id' => $request->line_id,
                'name' => $request->name,
            ];
            Buyer::create($data);
            return redirect()->route('buyerList')->with(['success' => 'Successfully Created!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

    public function buyer_status($id)
    {
        try {
            $find_existing_data = Buyer::where('id', $id)->first();

            if ($find_existing_data->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }
            $update_data = [
                'status' => $status
            ];
            Buyer::where('id', $id)->update($update_data);

            if ($find_existing_data->status == 0) {
                return redirect()->route('buyerList')->with(['success' => 'Successfully InActive!']);
            } else {
                return redirect()->back()->with(['success' => 'Successfully Active!']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }
    }

}
