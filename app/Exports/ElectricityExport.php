<?php

namespace App\Exports;

use App\Brand;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
//use Maatwebsite\Excel\Concerns\WithMapping;




class ElectricityExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Account::all();
        //$arr['accounts'] = Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 0)->orderBy('th_tran_no','desc')->get();
        //return view('admin.unpaidbills.index')->with($arr);   
        return Brand::select(['bm_name', 'bm_eb_rate', 'bm_eb_ob'])
            ->where('bm_eb', 'Electricity')->whereNotIn('bm_type', ['Kiosk'])->orderBy('bm_name', 'asc')->get();
    }

    public function headings(): array
    {
        return [
            'Brand Name', 'Unit Rate', 'Open Reading'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:C1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [


            'B' => '0.000'

        ];
    }
}
