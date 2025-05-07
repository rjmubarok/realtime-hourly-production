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

     public $productions,  $date;
     public function __construct($productions, $date)
     {
         $this->productions = $productions;
         $this->date = $date;
         
     }
     public function view(): View
     {
         return view('exports.spcesificdate_excel', [
             'productions' => $this->productions,
             'date' => $this->date
            
         ]);
     }
}
