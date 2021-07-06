<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Advance;
use Auth;


class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $arr['advances'] = Advance::where('ca_comp_code', auth()->user()->company)->where('ca_emp_id', auth()->user()->id)
            ->orderBy('ID', 'desc')->get();
        return view('admin.advances.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Advance $advance)
    {
        // $advance->ca_adv_date = $request->ca_adv_date;        
        $advance->ca_adv_amt = $request->ca_adv_amt;

        $date  = Carbon::createFromFormat('d-m-Y', $request->ca_adv_date);
        $advance->ca_adv_date = $date;
        $advance->ca_purpose = $request->ca_purpose;

        $advance->ca_emp_id = Auth::user()->id;
        $advance->ca_emp_name = Auth::user()->name;
        $advance->ca_comp_code = Auth::user()->company;


        $today = Carbon::now();
        $advance->ca_acc_year = $today->year;

        $todaymnt = Carbon::now();
        $advance->ca_acc_month = $todaymnt->month;

        $advance->ca_status = 0;
        $advance->ca_pay_status = 0;


        if ((Auth::user()->company)  == 1) {

            $advance->ca_comp_name = 'Al Jarwani';
        } else if ((Auth::user()->company)  == 92) {

            $advance->ca_comp_name = 'Mall Of Muscat';
        } else if ((Auth::user()->company)  == 34) {

            $advance->ca_comp_name = 'Oman Aquarium';
        } else if ((Auth::user()->company)  == 35) {

            $advance->ca_comp_name = 'Snow Village';
        }

        $filename = '';

        if ($request->hasFile('ca_flex1')) {
            $file = $request->file('ca_flex1');
            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . rand(1, 99999) . '.' . $ext;
            $file->storeAs('public/categories', $filename);
        }






        $advance->ca_flex1 = $filename;


        $advance->save();

        return redirect()->route('admin.advances.index')->with('success', 'Cash advance requested successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advance $advance)
    {
        //dd($advance);

        return view('admin.advances.show', compact('advance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advance $advance)
    {
        $arr['advance'] = $advance;
        return view('admin.advances.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advance $advance)
    {
        //        $advance->ca_status = $request->ca_status;



        $advance->ca_pay_remarks = $request->ca_pay_remarks;

        if (!empty($request->ca_pay_tran_date)) {

            $payment_date  = Carbon::createFromFormat('d-m-Y', $request->ca_pay_tran_date);
            $advance->ca_pay_tran_date = $payment_date;
        }

        if (!empty($request->ca_pay_status)) {

            $advance->ca_pay_status = $request->ca_pay_status;
        }


        $advance->ca_status = $request->ca_status;
        $advance->ca_adv_amt = $request->ca_adv_amt;

        $advance->ca_pay_id = Auth::user()->id;
        $advance->ca_pay_name = Auth::user()->name;

        $advance->save();
        return redirect()->route('admin.advanceall.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advance::destroy($id);
        return redirect()->route('admin.advanceall.index')->with('error', 'Transaction deleted successfully!');
    }
}
