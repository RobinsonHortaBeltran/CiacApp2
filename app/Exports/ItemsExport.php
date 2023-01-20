<?php

namespace App\Exports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\NamedRange;
use Maatwebsite\Excel\Events\Worksheet;

class ItemsExport implements FromView
{

    use Exportable;

    protected $items;
    protected $selects;
    protected $row_count;
    protected $column_count;

    public function __construct($items = null)
    {
        $this->items = $items;


    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Items::all();
    // }
    public function view(): View
    {
        // $status = ['active', 'pending', 'disabled'];
        // $departments = ['Account', 'Admin', 'Ict', 'Sales'];
        // $selects = [  //selects should have column_name and options
        //     ['departamento' => 'v', 'options' => $departments],
        //     ['estados' => 'W', 'options' => $status],
        // ];
        // $this->selects = $selects;
        // $this->row_count = 50; //number of rows that will have the dropdown
        // $this->column_count = 5;//number of columns to be auto sized

        return view('excel.excel-export-management',
        [
            "items"=>$this->items ?: Items::all()
        ]);
    }


}
