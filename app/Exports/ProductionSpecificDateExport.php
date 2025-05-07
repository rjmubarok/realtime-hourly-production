<?php

namespace App\Exports;

use App\Models\Floor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\View\View;
class ProductionSpecificDateExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

     public $productions,$allproductions,$excludebrandfloorproductions,  $date;
     public function __construct($productions,$allproductions,$excludebrandfloorproductions, $date)
     {
         $this->productions = $productions;
         $this->allproductions = $allproductions;
         $this->excludebrandfloorproductions = $excludebrandfloorproductions                                   ;
         $this->date = $date;

     }
     public function view(): View
     {
         return view('exports.spcesificdate_excel', [
             'productions' => $this->productions,
             'allproductions' => $this->allproductions,
             'excludebrandfloorproductions' => $this->excludebrandfloorproductions,
             'date' => $this->date

         ]);
     }
}
