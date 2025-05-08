<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Floor;
use App\Models\Line;
use App\Models\Size;
use App\Models\Process;
use App\Models\MC;
use App\Models\DefectCode;
use App\Models\TenCard;
use App\Models\Operator;
use App\Models\Hourlyproduction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\HourlyProductionReportExport;
use App\Exports\ProductionSpecificDateExport;
use App\Exports\ProductionReportDateToDateExport;
use Maatwebsite\Excel\Facades\Excel;
class HourlyproductionController extends Controller
{
    public function hourlyproduction()
    {
         $floors = Floor::whereStatus(1) ->get();
        $productions=Hourlyproduction::whereDate('created_at', Carbon::today())
        ->with('line','floor')->get();


        return view('hourlyproduction', compact('floors','productions'));
    }
    public function hourlyproductionAdd(Request $request)
    {
        //return $request->all();
        $productions=Hourlyproduction::whereDate('created_at', Carbon::today())
        ->where('floor_id',$request->floor_id)->get();
        if($productions->count() > 0){
            return response()->json(['error' => 'Hourly production already exists for today'], 400);
        }else{
            foreach ($request->line_id as $key => $value) {
                $hourlyproduction = new Hourlyproduction();
                $hourlyproduction->floor_id = $request->floor_id;
                $hourlyproduction->line_id = $value;
                $hourlyproduction->floor_id = $request->floor_id;
                $hourlyproduction->buyer = $request->buyer[$key];
                $hourlyproduction->style = $request->style[$key];
                $hourlyproduction->hourly_tar = $request->hourly_tar[$key];
                $hourlyproduction->day_tar = $request->day_tar[$key];
                $hourlyproduction->first = $request->first[$key];
                $hourlyproduction->second = $request->second[$key];
                $hourlyproduction->third = $request->third[$key];
                $hourlyproduction->fourth = $request->fourth[$key];
                $hourlyproduction->fifth = $request->fifth[$key];
                $hourlyproduction->sixth = $request->sixth[$key];
                $hourlyproduction->seventh = $request->seventh[$key];
                $hourlyproduction->eighth = $request->eighth[$key];
                $hourlyproduction->ninth = $request->ninth[$key];
                $hourlyproduction->tenth = $request->tenth[$key];
                $hourlyproduction->eleventh = $request->eleventh[$key];
                $hourlyproduction->twelfth = $request->twelfth[$key];
                $hourlyproduction->remark = $request->remark[$key];
                // $hourlyproduction->thirteenth = $request->thirteenth[$key];
                // $hourlyproduction->fourteenth = $request->fourteenth[$key];
                // Add other fields as needed
                // Save the hourly production record
               $status= $hourlyproduction->save();

            }
            if($status){
                return response()->json(['success' => 'Hourly production added successfully',200]);
            }
        }





    }
    public function hourlyproductionUpdate(Request $request)
    {
       // return $request->all();
        foreach ($request->line_id as $key => $value) {

            // Find the existing hourly production record by ID
            $hourlyproduction = Hourlyproduction::find($request->id[$key]);
            if (!$hourlyproduction) {
                return response()->json(['error' => 'Hourly production record not found'], 404);
            }
            // Update the fields with the new values
            $hourlyproduction->floor_id = $request->floor_id;
            $hourlyproduction->line_id = $value;
            $hourlyproduction->floor_id = $request->floor_id;
            $hourlyproduction->buyer = $request->buyer[$key];
            $hourlyproduction->style = $request->style[$key];
            $hourlyproduction->hourly_tar = $request->hourly_tar[$key];
            $hourlyproduction->day_tar = $request->day_tar[$key];
            $hourlyproduction->first = $request->first[$key];
            $hourlyproduction->second = $request->second[$key];
            $hourlyproduction->third = $request->third[$key];
            $hourlyproduction->fourth = $request->fourth[$key];
            $hourlyproduction->fifth = $request->fifth[$key];
            $hourlyproduction->sixth = $request->sixth[$key];
            $hourlyproduction->seventh = $request->seventh[$key];
            $hourlyproduction->eighth = $request->eighth[$key];
            $hourlyproduction->ninth = $request->ninth[$key];
            $hourlyproduction->tenth = $request->tenth[$key];
            $hourlyproduction->eleventh = $request->eleventh[$key];
            $hourlyproduction->twelfth = $request->twelfth[$key];
            // $hourlyproduction->thirteenth = $request->thirteenth[$key];
            // $hourlyproduction->fourteenth = $request->fourteenth[$key];
            $hourlyproduction->remark = $request->remark[$key];
            // Add other fields as needed
            // Save the hourly production record
            $status = $hourlyproduction->save();
            // Check if the update was successful
            if (!$status) {
                return response()->json(['error' => 'Failed to update hourly production record'], 500);
            }
        }
        if($status){
            return response()->json(['success' => 'Hourly production updated successfully']);
        }



    }

    public  function fetcLineByFloor(Request $request)
    {
        $floor=Floor::where('id', $request->floor_id)->first();

        $lines = Line::where('floor_id', $request->floor_id)->whereStatus(1)->get();
        if($lines){
            return view('form', compact('lines','floor'));
        }

        //return response()->json($line);
    }
    public function fetcLineByFloorforhourShow(Request $request)
    {
        $floor=Floor::where('id', $request->floor_id)->first();

        $lines = Line::where('floor_id', $request->floor_id)->whereStatus(1)->get();
        $line_ids = $lines->pluck('id')->toArray();

        $today = Carbon::today();
        $productions=Hourlyproduction::where('floor_id',$request->floor_id)->whereDate('created_at', Carbon::today())->with('line','floor')->get();
        //return $line_ids;
        if($productions){
            return view('hourly_production_show', compact('lines','floor','productions'));
        }

        //return response()->json($line);
    }
    public function SpecificDateData(Request $request)
    {
        $floor=Floor::where('id', $request->floor_id)->first();

        $lines = Line::where('floor_id', $request->floor_id)->whereStatus(1)->get();
        $line_ids = $lines->pluck('id')->toArray();

        $date = $request->date;
        $productions=Hourlyproduction::where('floor_id',$request->floor_id)->whereDate('created_at',  $date)->with('line','floor')->get();
      //  return $productions;
        if($productions){
            return view('specific_hourly_production_show', compact('lines','floor','productions','date'));
        }

        //return response()->json($line);
    }
    public function yesterdayData(Request $request)
    {
        $floor=Floor::where('id', $request->floor_id)->first();

        $lines = Line::where('floor_id', $request->floor_id)->whereStatus(1)->get();
        $line_ids = $lines->pluck('id')->toArray();

        $yesterday = Carbon::yesterday()->toDateString();
        $productions=Hourlyproduction::where('floor_id',$request->floor_id)->whereDate('created_at',  $yesterday)->with('line','floor')->get();
      //  return $productions;
        if($productions){
            return view('priviousday_hourly_production_show', compact('lines','floor','productions'));
        }

        //return response()->json($line);
    }
    public function ReportSubmit(Request $request)
    {
      // return $request->all();

        $floor=Floor::where('id', $request->floor_id)->first();
        $floor_id=$floor->id;
        // $start_date = date('Y-m-d', strtotime($request->start_date));
        // $end_date = date('Y-m-d', strtotime($request->end_date));
        $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
        $end_date = Carbon::parse($request->input('end_date'))->endOfDay();
        $report = DB::table('hourlyproductions')
        ->select(
            'line_id',
            DB::raw('COUNT(*) as total_records'),
            DB::raw('SUM(day_tar) as sum_day_tar'),
            DB::raw('SUM(hourly_tar) as sum_hourly_tar'),
            DB::raw('SUM(first) as sum_first'),
            DB::raw('SUM(second) as sum_second'),
            DB::raw('SUM(third) as sum_third'),
            DB::raw('SUM(fourth) as sum_fourth'),
            DB::raw('SUM(fifth) as sum_fifth'),
            DB::raw('SUM(sixth) as sum_sixth'),
            DB::raw('SUM(seventh) as sum_seventh'),
            DB::raw('SUM(eighth) as sum_eighth'),
            DB::raw('SUM(ninth) as sum_ninth'),
            DB::raw('SUM(tenth) as sum_tenth'),
            DB::raw('SUM(eleventh) as sum_eleventh'),
            DB::raw('SUM(twelfth) as sum_twelfth')
        )
        ->where('floor_id', $request->floor_id)
        ->whereBetween('created_at', [$start_date, $end_date])
        ->groupBy('line_id')
        ->get();

    // Get line names to join
    $lineNames = DB::table('lines')->pluck('name', 'id');

    // Attach line names to results
    foreach ($report as $row) {
        $row->line_name = $lineNames[$row->line_id] ?? 'Unknown';
    }

       // return $productions;


        if($report){
            return view('hourly_production_report', compact('report','start_date','end_date','floor_id'));
        }


    }

    public function downloadReport(Request $request)
{
    // Validate the request
    $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
    $end_date = Carbon::parse($request->input('end_date'))->endOfDay();
    $floor_id = $request->input('floor_id');

    // $start_date = date('Y-m-d', strtotime($request->start_date));
    // $end_date = date('Y-m-d', strtotime($request->end_date));

    $report = DB::table('hourlyproductions')
        ->select(
            'line_id',
            DB::raw('COUNT(*) as total_records'),
            DB::raw('SUM(day_tar) as sum_day_tar'),
            DB::raw('SUM(hourly_tar) as sum_hourly_tar'),
            DB::raw('SUM(first) as sum_first'),
            DB::raw('SUM(second) as sum_second'),
            DB::raw('SUM(third) as sum_third'),
            DB::raw('SUM(fourth) as sum_fourth'),
            DB::raw('SUM(fifth) as sum_fifth'),
            DB::raw('SUM(sixth) as sum_sixth'),
            DB::raw('SUM(seventh) as sum_seventh'),
            DB::raw('SUM(eighth) as sum_eighth'),
            DB::raw('SUM(ninth) as sum_ninth'),
            DB::raw('SUM(tenth) as sum_tenth'),
            DB::raw('SUM(eleventh) as sum_eleventh'),
            DB::raw('SUM(twelfth) as sum_twelfth')
        )
        ->where('floor_id', $request->floor_id)
        ->whereBetween('created_at', [$start_date, $end_date])
        ->groupBy('line_id')
        ->get();

    $lineNames = DB::table('lines')->pluck('name', 'id');
    foreach ($report as $row) {
        $row->line_name = $lineNames[$row->line_id] ?? 'Unknown';
    }

    return Excel::download(
        new HourlyProductionReportExport($report, $start_date, $end_date, $floor_id),
        'Hourly_Production_Report.xlsx'
    );


}



public function Summary(){


    $today = Carbon::today();
    $floor=Floor::whereStatus(1)->get();


    // Get all floors with today's hourly production
    $productions = Floor::whereStatus(1)->with(['hourlyproductions' => function ($query) use ($today) {
        $query->whereDate('created_at', $today);

    }])->get();
    $allproductions = Floor::whereStatus(1)->with(['hourlyproductions' => function ($query) use ($today) {
        $query->whereDate('created_at', $today);

    }])->get();
    $excludebrandfloorproductions = Floor::whereStatus(1)
    ->where('name', '!=', 'BRAND')
    ->with(['hourlyproductions' => function ($query) use ($today) {
        $query->whereDate('created_at', $today);
    }])->get();
   // dd( $productions)   ;

   return view('hourly_production_summary', compact('productions','floor','allproductions','excludebrandfloorproductions'));
}
public function summary_specific_date(Request $request){


    $today = $request->date;

    // Get all floors with today's hourly production
    $productions = Floor::whereStatus(1)->with(['hourlyproductions' => function ($query) use ($today) {
        $query->whereDate('created_at', $today);

    }])->get();
   //return $productions;
   $allproductions = Floor::whereStatus(1)->with(['hourlyproductions' => function ($query) use ($today) {
    $query->whereDate('created_at', $today);

}])->get();
$excludebrandfloorproductions = Floor::whereStatus(1)
->where('name', '!=', 'BRAND')
->with(['hourlyproductions' => function ($query) use ($today) {
    $query->whereDate('created_at', $today);
}])->get();

   return view('spesipic_date_summary', compact('productions','today','excludebrandfloorproductions','allproductions'));
}
public function SpesificDateexport($date)
{
    $date = $date;
    $productions = Floor::whereStatus(1)->with(['hourlyproductions' => function ($query) use ($date) {
        $query->whereDate('created_at', $date);

    }])->get();
    $allproductions = Floor::whereStatus(1)->with(['hourlyproductions' => function ($query) use ($date) {
        $query->whereDate('created_at', $date);

    }])->get();
    $excludebrandfloorproductions = Floor::whereStatus(1)
->where('name', '!=', 'BRAND')
->with(['hourlyproductions' => function ($query) use ($date) {
    $query->whereDate('created_at', $date);
}])->get();
    return Excel::download(
        new ProductionSpecificDateExport($productions,$allproductions,$excludebrandfloorproductions, $date),

        'report_' . $date . '.xlsx'
    );
}

public function SummeryFilter(Request $request)
{

    $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
    $end_date = Carbon::parse($request->input('end_date'))->endOfDay();


    $floors = Floor::where('status', 1)
        ->with(['lines.hourlyproductions' => function ($query) use ($start_date, $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }])
        ->get();

    // Sum production values per line
    $productions = $floors->map(function ($floor) {
        return [
            'floor_name' => $floor->name,
            'lines' => $floor->lines->map(function ($line) {
                $totals = [
                    'first' => 0, 'second' => 0, 'third' => 0, 'fourth' => 0,
                    'fifth' => 0, 'sixth' => 0, 'seventh' => 0, 'eighth' => 0,
                    'ninth' => 0, 'tenth' => 0, 'eleventh' => 0, 'twelfth' => 0,
                    'day_tar' => 0, 'hourly_tar' => 0
                ];

                foreach ($line->hourlyproductions as $production) {
                    foreach ($totals as $key => $val) {
                        $totals[$key] += $production->$key;
                    }
                }

                return [
                    'line_name' => $line->name,
                    'totals' => $totals
                ];
            })
        ];
    });

   // return $productions;
    return view('summary_filter', compact('productions', 'start_date', 'end_date'));
}
public function DateToDateExport(Request $request)
{

    $start_date = Carbon::parse($request->input('start_date'))->startOfDay();
    $end_date = Carbon::parse($request->input('end_date'))->endOfDay();

   // return $start_date;



    $floors = Floor::where('status', 1)
        ->with(['lines.hourlyproductions' => function ($query) use ($start_date, $end_date) {
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }])
        ->get();

    // Sum production values per line
    $productions = $floors->map(function ($floor) {
        return [
            'floor_name' => $floor->name,
            'lines' => $floor->lines->map(function ($line) {
                $totals = [
                    'first' => 0, 'second' => 0, 'third' => 0, 'fourth' => 0,
                    'fifth' => 0, 'sixth' => 0, 'seventh' => 0, 'eighth' => 0,
                    'ninth' => 0, 'tenth' => 0, 'eleventh' => 0, 'twelfth' => 0,
                    'day_tar' => 0, 'hourly_tar' => 0
                ];

                foreach ($line->hourlyproductions as $production) {
                    foreach ($totals as $key => $val) {
                        $totals[$key] += $production->$key;
                    }
                }

                return [
                    'line_name' => $line->name,
                    'totals' => $totals
                ];
            })
        ];
    });

  //  return $productions;
    return Excel::download(
        new ProductionReportDateToDateExport($productions, $start_date, $end_date),
        'report_' . $start_date .'_to_'.$end_date. '.xlsx'
    );

}














}
