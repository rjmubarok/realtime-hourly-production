<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Line;
use App\Models\Operator;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function fetchFloor(Request $request)
    {
        $line = Line::where('floor_id', $request->floor_id)->whereStatus(1)->get();
        return response()->json($line);
    }
    public function fetcLineByFloor(Request $request)
    {
        $line = Line::where('floor_id', $request->floor_id)->whereStatus(1)->get();
        return response()->json($line);
    }
    public function fetchBuyer(Request $request)
    {
        $buyer = Buyer::where('floor_id', $request->line_id)
        ->whereStatus(1)->get();
        return response()->json($buyer);
    }
    public function fetchBuyerbyline(Request $request)
    {
        $buyer = Buyer::where('line_id', $request->line_id)
        ->whereStatus(1)->get();
        return response()->json($buyer);
    }
    public function fetchOperatorByLine(Request $request)
    {
        $operator = Operator::where('line_id', $request->line_id)
        ->whereStatus(1)->get();
        return response()->json($operator);
    }
}
