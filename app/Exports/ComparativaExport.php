<?php

namespace App\Exports;

use App\Models\cotizacion;
use App\Models\Items;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ComparativaExport implements FromView
{
// ,ShouldAutoSize, WithDrawings
    use Exportable;

    protected $cotizaciones;

    public function __construct($cotizaciones = null)
    {
        $this->cotizaciones = $cotizaciones;
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Items::all();
    // }
    // public function headings(): array
    // {
    //     return [
    //         'CUADRO COMPARATIVO'
    //     ];


    // }
    public function view(): View
    {
        return view('excel.comparativa-export-management',
        [
            "cotizaciones"=>$this->cotizaciones ?: cotizacion::all()
        ]);
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('/assets/img/apple-icon.png'));
    //     $drawing->setHeight(90);
    //     $drawing->setCoordinates('B1');

    //     return $drawing;
    // }
}
