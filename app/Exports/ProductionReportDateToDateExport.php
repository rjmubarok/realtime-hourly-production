<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductionReportDateToDateExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $productions, $start_date, $end_date;
    public function __construct($productions, $start_date, $end_date)
    {
        $this->productions = $productions;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
       
    }
    public function view(): View
    {
        return view('exports.date_to_date_excel', [
            'productions' => $this->productions,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            
        ]);
    }

}
