<?php

namespace App\Exports;

use App\Utility;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
//use Maatwebsite\Excel\Concerns\WithMapping;




class ElectricityIndexExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Account::all();
        //$arr['accounts'] = Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 0)->orderBy('th_tran_no','desc')->get();
        //return view('admin.unpaidbills.index')->with($arr);   
        return Utility::select(['ui_brand_name', 'ui_comp_name', 'ui_type', 'ui_vat_no', 'ui_from_date', 'ui_to_date', 'ui_tran_no', 'ui_inv_no', 'ui_omr', 'ui_cmr', 'ui_rate', 'ui_consumed', 'ui_amount', 'ui_vat', 'ui_netamount', 'ui_created_name', 'created_at'])
            ->where('ui_type', 'Electricity')->orderBy('ui_brand_name', 'asc')->get();
    }

    public function headings(): array
    {
        return [
            'Brand Name', 'Company Name', 'Type', 'Vat #', 'From Date', 'To Date', 'Tran No', 'Inv No', 'OMR', 'CMR', 'Rate', 'Consumed', 'Amount', 'Vat Amount', 'Net Amount', 'Created By', 'Created Date'
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
