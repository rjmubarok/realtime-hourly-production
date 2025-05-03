<?php

namespace App\Exports;

use App\Models\HourlyProduction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class HourlyProductionReportExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $report, $start_date, $end_date, $floor_id;
    public function __construct($report, $start_date, $end_date, $floor_id)
    {
        $this->report = $report;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->floor_id = $floor_id;
    }
    public function view(): View
    {
        return view('exports.hourly_production_excel', [
            'report' => $this->report,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'floor_id' => $this->floor_id,
        ]);
    }


}
